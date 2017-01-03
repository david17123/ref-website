<div class="admin-manage-uni-side-menu">
    <a href="{{ route('manageUniSite', ['uniUrl' => $university->subdomain]) }}"
       class="side-menu-entry @if (isset($selectedMenu) && $selectedMenu === 'site') side-menu-entry__selected @endif"
    >
        Site
    </a>
    <a href="#"
       class="side-menu-entry @if (isset($selectedMenu) && $selectedMenu === 'sermons') side-menu-entry__selected @endif"
    >
        Sermon summaries
    </a>
    <a href="#"
       class="side-menu-entry @if (isset($selectedMenu) && $selectedMenu === 'events') side-menu-entry__selected @endif"
    >
        Events
    </a>
</div>
