<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use App\Http\Requests\ContactFormRequest;
use App\Http\Resources\ContactResource;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['メールアドレスまたはパスワードが正しくありません。'],
            ]);
        }

            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
            'message' => 'ログインしました',
            'token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ], 200);
    }
public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'ログアウトしました',
    ], 200);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Contact::class);
        $contacts = Contact::where('user_id', auth()->id())->get();
        return response()->json($contacts);
    }

    public function confirm(ContactFormRequest $request)
    {
        $validated = $request->validated();

        return response()->json(
            [
            'data' => $validated,
            'redirect_url' => route('api.contacts.confirm'),
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactFormRequest $request)
    {
        $this->authorize('create', Contact::class);

        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Contact::create($data);

        return response()->json([
            'message' => '登録が完了しました',
            'redirect_url' => route('api.contacts.thanks')
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json([
                'message' => '見つかりません'
            ], 404);
        }

        $this->authorize('view', $contact);
        
        return new ContactResource($contact);
    }
    
    public function thanks()
    {
        return response()->json([
            'message' => 'お問い合わせを受け付けました。',
            'redirect_url' => route('api.contacts.thanks')
        ], 200);
    }
}
