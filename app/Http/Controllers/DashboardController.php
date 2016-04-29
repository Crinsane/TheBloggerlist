<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Laravel\Spark\Repositories\NotificationRepository;

class DashboardController extends Controller
{
    private $notifications;

    public function __construct(NotificationRepository $notifications)
    {
        $this->notifications = $notifications;
    }
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
//        $this->notifications->create(auth()->user(), [
//            'icon' => 'fa-users',
//            'body' => 'A team member completed a task!',
//            'action_text' => 'View Task',
//            'action_url' => '/link/to/task',
//        ]);

        return view('pages.dashboard');
    }
}
