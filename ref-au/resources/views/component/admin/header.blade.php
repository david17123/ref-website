<div class="admin-header">
    <div class="admin-header__right-content">
        <span class="admin-header__logged-in-user">{{ $loggedInUser->name }}</span>
        <a class="admin-header__log-out-link" href="{{ url('/logout') }}">Logout</a>
    </div>
</div>
