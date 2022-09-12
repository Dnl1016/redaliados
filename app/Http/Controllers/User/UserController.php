<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\User;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserResource;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::all();
       // return UserResource::collection(User::all());
       $usuarios = User::all();

        return $this->showAll($usuarios);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        $this->validate($request, $reglas);

        $campos = $request->all();
        $campos['password'] = bcrypt($request->password);
        $campos['verified'] = User::USUARIO_NO_VERIFICADO;
        $campos['verification_token'] = User::generarVerificationToken();
        $campos['admin'] = User::USUARIO_REGULAR;

        $usuario = User::create($campos);
        return $this->showOne($usuario, 201);
    
        
        // return response()->json([
        //     'res'=>true,
        //     'msg'=>'La usuario quedo guardada correctamente'
        // ],200);

        // return (new (User::create($request->all())))
        // ->additional(['msg'=>'se guardo correctamente'])
        // ->response()
        // ->setStatusCode(202);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        // return new ($usuario);
        return $this->showOne($usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $reglas = [
            'email' => 'email|unique:users,email,' . $$usuario->id,
            'password' => 'min:6|confirmed',
            'admin' => 'in:' . User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_REGULAR,
        ];

        $this->validate($request, $reglas);

        if ($request->has('name')) {
            $$usuario->name = $request->name;
        }

        if ($request->has('email') && $$usuario->email != $request->email) {
            $$usuario->verified = User::USUARIO_NO_VERIFICADO;
            $$usuario->verification_token = User::generarVerificationToken();
            $$usuario->email = $request->email;
        }

        if ($request->has('password')) {
            $$usuario->password = bcrypt($request->password);
        }

        if ($request->has('admin')) {
            $this->allowedAdminAction();
        
            if (!$$usuario->esVerificado()) {
                return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar su valor de administrador', 409);
            }

            $$usuario->admin = $request->admin;
        }

        if (!$$usuario->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $$usuario->save();

        return $this->showOne($$usuario);
       
        // $usuario->update($request->validated());
        // return (new ($usuario))
        // ->additional(['msg'=>'se actualizo correctamente'])
        // ->response()
        // ->setStatusCode(202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User  $usuario)
    {
        $usuario->delete();
        return $this->showOne($usuario);
        // return (new ($usuario))
        // ->additional(['msg'=>'se elimino correctamente'])
        // ->response()
        // ->setStatusCode(202);
    }
}
