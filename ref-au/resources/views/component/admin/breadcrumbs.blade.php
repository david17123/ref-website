@if ($sitePage->hasBreadcrumbs())
    <div class="breadcrumbs">
        <?php $breadcrumbs = $sitePage->getBreadcrumbs(); ?>
        @foreach ($breadcrumbs as $breadcrumb)
            <div class="breadcrumbs__entry">
                @if ( $breadcrumb['link'] !== ''  )
                    <a class="breadcrumbs__entry__link" href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['text'] }}</a>
                @else
                    {{ $breadcrumb['text'] }}
                @endif
            </div>
            @if ( $breadcrumb != $breadcrumbs[count($breadcrumbs)-1] )
                <span class="breadcrumbs__separator">/</span>
            @endif
        @endforeach
    </div>
@endif
