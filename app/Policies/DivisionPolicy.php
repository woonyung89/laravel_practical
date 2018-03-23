<?php


namespace App\Policies;

use App\User;
use App\Division;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class DivisionPolicy
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
  * Determine if the given user can view divisions.
  *
  * @param \App\User $user
  * @return bool
  */
  public function view(User $user)
  {
    return $user->can(’view-division’);
  }

  /**
  * Determine if the given user can create divisions.
  *
  * @param \App\User $user
  * @return bool
  */
  public function create(User $user)
  {
    return $user->can(’create-division’);
  }

  /**
  * Determine if the given user can manage divisions.
  *
  * @param \App\User $user
  * @param \App\Division $division
  * @return bool
  */

  public function manage(User $user, Division $division)
  {
    return $user->can(’manage-division’);
  }
}
