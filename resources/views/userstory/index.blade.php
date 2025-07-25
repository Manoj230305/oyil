{{-- @if (View::exists('userstory.userdata.content'.$user_id)) --}}
    @include('userstory.headers.top') 
    @include('userstory.headers.header') 

    @include('userstory.userdata.content1')


    <!-- Parallax -->
    
    <section class="call-to-action section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-9" style="">
                    <div class="call-action-content text-center">
                        <h2 class="action-title">Have any event's in mind?</h2>
                        <p>I'd love to hear about it! Whether it's a small idea or a grand vision, I'm ready to bring memories.!</p>
                        <ul>
                            <li><a href="#" class="btn btn-1">Book Now</a></li>
                            <li><a href="#" class="btn btn-2">Make a Call</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (View::exists('userstory.usr_images.gallery'.$user_id))
        @include('userstory.usr_images.gallery'.$user_id)
    @endif
    @include('userstory.contact')
    @include('userstory.footers.footer')
    @include('userstory.footers.dependency')

{{-- @else --}}
    @include('errors.404')
{{-- @endif --}}