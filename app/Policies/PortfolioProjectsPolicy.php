<?php

namespace App\Policies;

use App\Models\User;
use App\Models\portfolio_projects;
use Illuminate\Auth\Access\Response;

class PortfolioProjectsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, portfolio_projects $portfolioProjects): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, portfolio_projects $portfolioProjects): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, portfolio_projects $portfolioProjects): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, portfolio_projects $portfolioProjects): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, portfolio_projects $portfolioProjects): bool
    {
        return false;
    }
}
