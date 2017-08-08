<div class="site-footer">
    <div class="site-footer__content-container">
        <div class="site-footer__section site-footer__section--contact">
            <div class="site-footer__section__header">
                Contact
            </div>
            <div class="site-footer__section__content">
                <div class="uni-email">info@ref-au.org</div>
                <div class="contact-person">
                    <p>Marcel Tjiang</p>
                    <p>+61 412 345 678</p>
                </div>
                <div class="contact-person">
                    <p>Kenneth Hartanto</p>
                    <p>+61 405 059 466</p>
                </div>
            </div>
        </div>
        <div class="site-footer__section site-footer__section--recent-posts">
            <div class="site-footer__section__header">
                Recent Posts
            </div>
            <div class="site-footer__section__content">
                @foreach ($recentPosts as $post)
                    <a class="post-entry" href="{{ $post['url'] }}">
                        <div class="post-entry__thumbnail" style="background-image: url('{{ $post['imageUrl'] }}')"></div>
                        <div class="post-entry__details">
                            <div class="post-entry__title">
                                {{ $post['title'] }} {{-- TODO @David Deal with long titles --}}
                            </div>
                            <div class="post-entry__date">
                                <i class="material-icons post-entry__date__icon">&#xE8DF;</i>
                                <span class="post-entry__date__text">20 Sep 2017</span> {{-- TODO @David Do this properly --}}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="site-footer__section site-footer__section--social">
            <div class="site-footer__section__header">
                Follow Us
            </div>
            <div class="site-footer__section__content">
                <div class="social-links-container">
                    <a class="social-link social-link--facebook" href="#">
                        <img class="social-link__icon" alt="Facebook" src="/img/component/footer/Facebook.png" />
                    </a>
                    <a class="social-link social-link--youtube" href="#">
                        <img class="social-link__icon" alt="Youtube" src="/img/component/footer/Youtube.png" />
                    </a>
                    <a class="social-link social-link--instagram" href="#">
                        <img class="social-link__icon" alt="Instagram" src="/img/component/footer/Instagram.png" />
                    </a>
                </div>
                <div class="subscribe-form-container">
                    <div class="subscribe-form-header">
                        Email Newsletter:
                    </div>
                    <form class="subscribe-form js-subscribe-form" method="POST">
                        <input class="subscribe-form__text-field input-text js-subscribe-email" type="text" name="email" value="" placeholder="Your Email Address" />
                        <input class="subscribe-form__submit js-subscribe-button" type="submit" value="Sign up">
                    </form>
                    <div class="success success--hidden js-success-indicator">
                        <i class="material-icons success__icon">&#xE86C;</i>
                        <span class="success__text">Subscribed!</span> {{-- TODO @David This results in server error --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
