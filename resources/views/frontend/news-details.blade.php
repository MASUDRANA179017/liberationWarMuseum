@extends('layouts.frontend')
@section('title','News-Details')
@section('content')
<style>
    .comment-single__avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
    background-color: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    color: #495057;
}
</style>
<!--banner section start -->
<section class="common-banner">
   <div class="container">
      <div class="row">
         <div class="common-banner__content text-center">
            <span class="sub-title-main"><i class="icon-donation"></i>{{ $setting->company_name }}</span>
            <h2 class="title-animation">News Details</h2>
         </div>
      </div>
   </div>
   <div class="banner-bg">
      @php
        $coverPhoto = $allCoverImages->where('page_name', 'news')->first();
    @endphp

    @if ($coverPhoto)
        <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
    @else
        <img src="assets/images/page-bg.jpg" alt="Image">
    @endif
   </div>
</section>
<!-- banner section end -->
<!-- ==== blog details section start ==== -->
<section class="blog-main cm-details">
   <div class="container">
      <div class="row gutter-60">
         <div class="col-12 col-xl-8">
            <div class="cm-details__content">
               <div class="cm-details__poster" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                  <img src="{{ $newsdetails->image }}" alt="Image">
               </div>
               <div class="cm-details-meta">
                  <p class="mb-0"><i class="fa-solid fa-calendar-days"></i>{{ \Carbon\Carbon::parse($newsdetails->date)->format('d M Y') }}</p>
                  <p class="mb-0"><i class="fa-solid fa-user"></i>{{ $newsdetails->author??'' }}</p>
               </div>
               <div class="cm-group">
                  <h3 class="title-animation">{{ $newsdetails->title }}</h3>
                  <p>{!! $newsdetails->description !!}
                  </p>
               </div>
               <!-- <div class="cm-img-group cta">
                  <div class="cm-img-single">
                     <img src="assets/images/event/pp-one.png" alt="Image">
                  </div>
                  <div class="cm-img-single">
                     <img src="assets/images/event/pp-two.png" alt="Image">
                  </div>
               </div> -->
               <div class="details-footer cta">
                  <div class="details-tag">
                     <div class="tag-header">
                        <h6>Tags:</h6>
                     </div>
                     <div class="tag-wrapper">
                        <!-- <a href="blog-list.html">Charity</a> -->
                         @php
                           $tags = explode(',', $newsdetails->tags);
                        @endphp

                        @foreach($tags as $tag)
                           <a href="javascript:void(0);">{{ trim($tag) }}</a>
                        @endforeach

                     </div>
                  </div>
                  <div class="details-tag">
                     <div class="tag-header">
                        <h6>Share:</h6>
                     </div>
                     <div class="social">
                        <a href="https://www.facebook.com/" target="_blank" aria-label="share us on facebook"
                           title="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="https://vimeo.com/" target="_blank" aria-label="share us on vimeo" title="vimeo">
                        <i class="fa-brands fa-vimeo-v"></i>
                        </a>
                        <a href="https://x.com/" target="_blank" aria-label="share us on twitter" title="twitter">
                        <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/" target="_blank" aria-label="share us on linkedin"
                           title="linkedin">
                        <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="blog-comment pt-0 " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">

                        <div class="comment__form mt-5 p-4 rounded-4 custom-bg-primary-100" data-aos="fade-up"
                            data-aos-duration="1000" data-aos-delay="100">
                            <div class="comment-header mb-40">
                                <h4 class="mt-8 fw-6 title-animation">Leave A Comment</h4>
                            </div>
                            {{-- Session Message Display --}}
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('comments.store', $newsdetails->id) }}" method="POST" novalidate>
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="commentName" class="form-label">Your Name*</label>
                                        <input type="text" class="form-control" id="commentName" name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="commentEmail" class="form-label">Your Email*</label>
                                        <input type="email" class="form-control" id="commentEmail" name="email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="commentMessage" class="form-label">Your Comment*</label>
                                        <textarea class="form-control" id="commentMessage" name="message" rows="5" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary fw-bold px-4 py-2">Submit Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Display Existing Comments Section --}}
                        <div class="comments-section">
                            <h4 class="mb-4">Comments ({{ $newsdetails->comments->count() }})</h4>

                            @forelse ($newsdetails->comments->sortByDesc('created_at') as $comment)
                                <div class="comment-single">
                                    <div class="comment-single__avatar">
                                        {{ strtoupper(substr($comment->name, 0, 1)) }}
                                    </div>
                                    <div class="comment-single__content">
                                        <h5>{{ $comment->name }}</h5>
                                        <p>{{ $comment->message }}</p>
                                        <div class="comment-single__meta">
                                            <p class="mb-0">{{ $comment->created_at->diffForHumans() }}</p>

                                            {{-- Updated Like Button --}}
                                            @php
                                                // Check session to see if the user has already liked this comment
                                                $likedComments = session()->get('liked_comments', []);
                                                $isLiked = in_array($comment->id, $likedComments);
                                            @endphp
                                            <button title="like" class="like-btn {{ $isLiked ? 'liked' : '' }}"
                                                    data-id="{{ $comment->id }}"
                                                    data-url="{{ route('comments.like', $comment->id) }}">
                                                <i class='bx {{ $isLiked ? 'bxs-heart' : 'bx-heart' }}'></i>
                                                <span>Like</span>
                                                (<span class="like-count">{{ $comment->comment_like ?? 0 }}</span>)
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-secondary text-center">
                                    Be the first to leave a comment!
                                </div>
                            @endforelse
                        </div>

                    </div>
            </div>
         </div>
         <div class="col-12 col-xl-4">
            <div class="blog-main__sidebar">
               {{-- <div class="cm-details__sidebar">
                  <div class="team ff-team pt-0 pb-2" data-aos="fade-up" data-aos-duration="1000">
                     <div class="team-six-wrapper shadow-none custom-bg-primary-100 rounded-4 ribbon-box right" data-aos="fade-up" data-aos-duration="1000"
               data-aos-delay="300">
               <div class="ribbon-two ribbon-two-primary"><span class="fs-12 fw-400 text-center">Batch: <b>(16)</b></span></div>
               <div class="team__single van-tilt">
                    <div class="team__single-thumb">
                        <a href="team-details.html">
                        <img src="assets/images/team/two.png" alt="Image" class="rounded-4">
                        </a>
                        <div class="team__icons">
                            <div class="team__single__thumb-social">
                            <ul>
                                <li>
                                    <a href="index.html">
                                    <b>Session: </b>1998-99
                                    </a>
                                </li>
                            </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team__single-content">
                        <a href="team-details.html" class="member-title-lg">Arian Drobloas</a>
                        <span class="link-lg p-0 m-0">Secretary General</span>
                    </div>
               </div>
            </div> --}}
                  </div>
                  <div class="cm-sidebar-widget rounded-4 custom-bg-primary-100" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                     <h2 class="mb-4 pb-2 border-bottom title-animation mt-0 fs-20 lh-1 text-center"><span>Related</span> News</h2>

                     <div class="cm-sidebar-post">
                        @foreach ($newses as $news)
                        <div class="single-item">
                           <div class="thumb">
                              <a href="{{route('news.details', $news->slug)}}">
                              <img src="{{$news->image}}" alt="Image">
                              </a>
                           </div>
                           <div class="content">
                              <p><i class="fa-solid fa-calendar-days"></i> <span> {{ \Carbon\Carbon::parse($news->date)->format('F d, Y') }}</span>
                              </p>
                              <p><a href="{{route('news.details', $news->slug)}}">{{$news->title}}</a>
                              </p>
                           </div>
                        </div>
                        @endforeach

                     </div>
                  </div>
                  <div class="cm-sidebar-widget rounded-4 custom-bg-primary-100" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                     <h2 class="mb-4 pb-2 border-bottom title-animation mt-0 fs-20 lh-1 text-center">Categories</h2>
                     <div class="cm-categories">
                        @foreach ($news_categories as $news_category)
                        <a href="{{route('news.details', $news_category->blog->first()->slug??'javascript:void(0);')}}">
                        <span>{{$news_category->name}}</span>
                        <span>{{$news_category->blog->count()}}</span>
                        </a>
                        @endforeach

                     </div>
                  </div>
                  <!-- <div class="cm-sidebar-widget rounded-4 custom-bg-primary-100" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                     <h2 class="mb-4 pb-2 border-bottom title-animation mt-0 fs-20 lh-1 text-center">Popular Tags</h2>
                     <div class="tag-wrapper">
                        <a href="shop.html">t-shirt</a>
                        <a href="shop.html">Banner Design</a>
                        <a href="shop.html">Brochures</a>
                        <a href="shop.html">Landing</a>
                        <a href="shop.html">Print</a>
                        <a href="shop.html">Business Card</a>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- ==== / blog details section end ==== -->

@endsection
@push('scripts')
<script>
$(function() {
    $('.comments-section').on('click', '.like-btn', function(e) {
        e.preventDefault();
        var button = $(this);
        var url = button.data('url');
        var icon = button.find('i');
        var likeCountSpan = button.find('.like-count');

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': '{{ csrf_token() }}' // Important for security
            },
            success: function(response) {
                if (response.success) {
                    // Update the like count on the page
                    likeCountSpan.text(response.like_count);

                    // Toggle the visual state of the button
                    if (response.liked) {
                        button.addClass('liked');
                        icon.removeClass('bx-heart').addClass('bxs-heart'); // Filled heart
                    } else {
                        button.removeClass('liked');
                        icon.removeClass('bxs-heart').addClass('bx-heart'); // Outline heart
                    }
                }
            },
            error: function(xhr) {
                console.error('An error occurred while liking the comment.');
                alert('Something went wrong!');
            }
        });
    });
});
</script>

@endpush
