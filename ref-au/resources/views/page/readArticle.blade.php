@extends('defaultLayout')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/page/readArticle.css') }}"/>
@endpush

@push('js')
    <script type="text/javascript" src="{{ elixir('js/page/readArticle.js') }}"></script>
@endpush

@section('pageContent')
    <div class="page-content-container">
        <div class="article-hero" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
        <div class="article-layouter">
            <div class="article-content">
                <h1 class="article-content__title">How Does God Answer Job?</h1>
                <p class="article-content__subtitle">Job 1:1-10</p>
                <div class="article-content__text-container js-article-text-container">
                    {{-- This should be totally removed and filled in by JS via PageArgs --}}
                    <p>NOT SUPPOSED TO BE HERE Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer bibendum gravida scelerisque. Aliquam ullamcorper tincidunt ante, a scelerisque mi placerat eu. Nulla molestie nisl nisi, a accumsan purus lacinia vel. Nunc vehicula velit in dignissim pellentesque. Quisque sollicitudin dolor metus, quis facilisis mauris cursus at. Pellentesque finibus tortor mollis purus imperdiet, eget hendrerit enim mattis. Nam tempor odio sollicitudin sem euismod aliquam quis vitae felis. Nulla facilisi. Quisque interdum urna sem, et cursus nisi tempor ac. Nullam placerat urna a accumsan ultrices. Ut porttitor aliquet magna, et fermentum est pellentesque id.</p>
                    <p>In pellentesque nunc massa, et scelerisque ante porta et. Nulla egestas sodales orci sed aliquet. In pellentesque mattis urna ac blandit. Phasellus sagittis et ex quis bibendum. Fusce id nisl mi. Vivamus a iaculis massa. Sed suscipit mattis mauris, sit amet ornare massa varius vitae. Vivamus elit ante, dapibus eget ultricies vitae, semper sed dui. Sed sapien neque, tincidunt et sapien quis, suscipit consequat ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                    <p>Nulla laoreet imperdiet elit, vel consequat nunc tristique id. Vivamus molestie auctor varius. Ut pulvinar massa nisl, vel tincidunt tellus aliquam vitae. Integer orci ipsum, lobortis at erat non, molestie dignissim lectus. Proin ante nibh, auctor sit amet ipsum at, condimentum feugiat mauris. Duis mollis elementum pellentesque. Phasellus aliquet, elit non varius hendrerit, risus nisl eleifend urna, vitae molestie mi nulla in risus. In hac habitasse platea dictumst. Aliquam eu massa ultricies, feugiat tellus et, placerat justo. Integer tincidunt faucibus ullamcorper. Aenean vitae sapien massa.</p>
                    <p>Pellentesque ligula nulla, elementum id turpis eu, eleifend scelerisque neque. Fusce mi elit, sollicitudin eget ipsum eu, vulputate scelerisque eros. Sed justo nulla, placerat vitae tellus quis, hendrerit interdum felis. Duis facilisis dapibus suscipit. Maecenas eget bibendum nulla. Quisque vehicula diam vitae erat ultricies, sit amet maximus purus lacinia. Sed enim sapien, posuere non placerat eu, aliquam quis diam. Maecenas placerat urna nisi, a egestas felis elementum vitae. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer vulputate, dolor eget feugiat viverra, massa nulla mollis risus, ut viverra velit justo sed neque. Nullam arcu ex, placerat quis magna ut, vestibulum dignissim augue. In laoreet enim vel dolor blandit, et cursus ex tristique.</p>
                    <p>Duis pretium, ex nec tincidunt facilisis, urna augue elementum elit, eu iaculis dolor nisi a metus. Proin semper, sem sed malesuada sagittis, orci erat tincidunt leo, ut consequat justo ipsum a lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut ut nunc eu eros elementum cursus. Sed sollicitudin auctor lectus, a fermentum elit viverra eu. Aenean eleifend sem id est fermentum aliquam. Suspendisse lobortis vitae sem nec venenatis. Duis turpis leo, cursus ut lacus sit amet, hendrerit suscipit eros. Aliquam eu ex rutrum est ultricies tincidunt. Integer quis vehicula ligula, at convallis urna. Vivamus blandit mollis felis convallis sodales. Etiam blandit libero eget mi blandit ultricies. Nullam ultrices volutpat orci, non tincidunt erat vehicula eu. Vestibulum sit amet arcu sed ipsum maximus posuere. Mauris accumsan ultrices neque ut ultrices. Sed ut ligula eu lorem congue interdum sit amet in nunc.</p>
                </div>
                <div class="article-content__footer">
                    <p class="article-content__date-created">
                        March 12, 2016
                    </p>
                </div>
            </div>
            <div class="other-articles-positioner">
                <div class="other-articles">
                    <h1 class="other-articles__heading">Articles</h1>
                    <div class="other-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <div class="other-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                        <div class="other-articles__entry__positioner">
                            <h1 class="other-articles__entry__title">Pokemon Go Culture</h1>
                            <span class="other-articles__entry__read-button">Read</span>
                        </div>
                    </div>
                    <a href="#" class="other-articles__view-more">
                        View More
                    </a>
                </div>
            </div>
        </div>
        <div class="prev-next-articles">
            <div class="prev-next-articles__entry" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)">
                <div class="prev-next-articles__entry__background">
                    <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                    <div class="background-gradient"></div>
                </div>
                <h1 class="prev-next-articles__entry__title">God's sovereignty</h1>
                <p class="prev-next-articles__entry__date-created">
                    July 12, 2016
                </p>
                <div class="prev-next-articles__entry__chin-button">
                    <div class="chin-button__arrow chin-button__arrow--left"></div>
                    <span class="chin-button__text">Previous Week</span>
                </div>
            </div>{{--
        --}}<div class="prev-next-articles__entry">
                <div class="prev-next-articles__entry__background">
                    <div class="background-image" style="background-image: url(http://www.w3schools.com/css/img_fjords.jpg)"></div>
                    <div class="background-gradient"></div>
                </div>
                <h1 class="prev-next-articles__entry__title">God's sovereignty</h1>
                <p class="prev-next-articles__entry__date-created">
                    July 12, 2016
                </p>
                <div class="prev-next-articles__entry__chin-button">
                    <span class="chin-button__text">Next Week</span>
                    <div class="chin-button__arrow chin-button__arrow--right"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
