<?php

namespace App\Policies;

use App\User;
use App\Member;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
  use HandlesAuthorization;


  /**
  * Create a new policy instance.
  *
  * @return void
  */
  public function __construct()
  {
    //
  }

  /**
  * Determine if the given user can view members.
  *
  * @param \App\User $user
  * @return bool
  */
  public function view(User $user)
  {
    return $user->can(’view-member’);
  }

  /**
  * Determine if the given user can create members.
  *
  * @param \App\User $user
  * @return bool
  */
  public function create(User $user)
  {
    return $user->can(’create-member’);
  }

  /**
  * Determine if the given user can manage members.
  *
  * @param \App\User $user
  * @param \App\Member $member
  * @return bool
  */
  public function manage(User $user, Member $member)
  {
    return $user->can(’manage-member’);
  }
}
