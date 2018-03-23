<?php

namespace App\Policies;

use App\User;
use App\Group;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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
  * Determine if the given user can view groups.
  *
  * @param \App\User $user
  * @return bool
  */
  public function view(User $user)
  {
    return $user->can(’view-group’);
  }

  /**
  * Determine if the given user can create groups.
  *
  * @param \App\User $user
  * @return bool
  */
  public function create(User $user)
  {

    return $user->can(’create-group’);
  }

  /**
  * Determine if the given user can manage groups.
  *
  * @param \App\User $user
  * @param \App\Group $group
  * @return bool
  */
  public function manage(User $user, Group $group)
  {
    return $user->can(’manage-group’);
  }
}
