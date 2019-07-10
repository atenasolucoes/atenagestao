<?php

namespace atenagestao\Policies;

use atenagestao\User;
use atenagestao\Servicos;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ServicoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the servicos.
     *
     * @param  \atenagestao\User  $user
     * @param  \atenagestao\Servicos  $servicos
     * @return mixed
     */
    public function view(User $user , Servicos $servicos)
    {
        if(Auth::user()->id == $servicos->user_id){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can create servicos.
     *
     * @param  \atenagestao\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the servicos.
     *
     * @param  \atenagestao\User  $user
     * @param  \atenagestao\Servicos  $servicos
     * @return mixed
     */
    public function update(User $user, Servicos $servicos)
    {
        //
    }

    /**
     * Determine whether the user can delete the servicos.
     *
     * @param  \atenagestao\User  $user
     * @param  \atenagestao\Servicos  $servicos
     * @return mixed
     */
    public function delete(User $user, Servicos $servicos)
    {
        //
    }
}
