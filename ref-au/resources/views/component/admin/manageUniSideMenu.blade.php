<div class="admin-manage-uni-side-menu">
    <a href="{{ route('manageUniSite', ['uniUrl' => $university->subdomain]) }}"
       class="side-menu-entry @if (isset($selectedMenu) && $selectedMenu === 'site') side-menu-entry__selected @endif"
    >
        Site
    </a>
    <a href="{{ route('manageSermonSummaries', ['uniUrl' => $university->subdomain]) }}"
       class="side-menu-entry @if (isset($selectedMenu) && $selectedMenu === 'sermonSummaries') side-menu-entry__selected @endif"
    >
        Sermon summaries
    </a>
    <a href="{{ route('manageEvents', ['uniUrl' => $university->subdomain]) }}"
       class="side-menu-entry @if (isset($selectedMenu) && $selectedMenu === 'events') side-menu-entry__selected @endif"
    >
        Events
    </a>
</div>
