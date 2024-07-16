<?php

namespace App\Policies;

use App\Models\PaymentHistory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentHistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PaymentHistory $paymentHistory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PaymentHistory  $paymentHistory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PaymentHistory $paymentHistory)
    {
        //
    }
}
