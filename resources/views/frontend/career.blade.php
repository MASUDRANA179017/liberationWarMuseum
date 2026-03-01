@extends('layouts.frontend')
@section('title', 'Carrer')
@section('content')

   <!--banner section start -->
   <section class="common-banner">
      <div class="container">
         <div class="row">
            <div class="common-banner__content text-center">
               <span class="sub-title-main"><i class="icon-donation"></i> {{$setting->company_name ?? ''}}</span>
               <h2 class="title-animation">Career Opportunity</h2>
            </div>
         </div>
      </div>
      <div class="banner-bg">
         @php
            $coverPhoto = $allCoverImages->where('page_name', 'career')->first();
         @endphp

         @if ($coverPhoto)
            <img src="{{ asset('storage/' . $coverPhoto->cover_image) }}" alt="Image">
         @else
            <img src="assets/images/page-bg.jpg" alt="Image">
         @endif
      </div>
   </section>
   <!-- banner section end -->

   <!-- Career Section Start -->
   <section id="careerSection" class="event-eight-area position-relative z-1">
      <div class="container">
         <div class="section__header text-center" data-aos="fade-up" data-aos-duration="1000">
            <span class="sub-title-main"><i class="fa-solid fa-briefcase"></i>Join Our Team</span>
            <h2 class="title-animation mt-0"><span>Career</span> Opportunity</h2>
         </div>
         <div class="row">
            @foreach ($careers as $career)
               <div class="col-12 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="700"
                  data-aos-delay="200">
                  <div class="border shadow-sm rounded-4 ribbon-box right">
                     <div class="card-body p-2">
                        <a class="align-items-center d-block" style="cursor: pointer;">
                           <div class="d-flex align-items-center overflow-hidden w-100">
                              <div
                                 class="career-logo-box d-flex align-items-center justify-content-center rounded-3 bg-white">
                                 <img src="/storage/{{$career->image}}" class="rounded-3" alt="Company Logo">
                              </div>
                              <div class="ps-3 w-100">
                                 <p class=" title-lg fs-18 fw-600 mb-2 lh-sm pb-1">{{$career->title}}</p>
                                 <p class="events-six-content-top sub-title-lg fs-13">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($career->description), 240, ' ...') }}
                                 </p>

                                 <div
                                    class="pt-1 d-flex align-items-center justify-content-between pb-1 client-details-inner">
                                    <h-3 class="title-sm">Vacancy: <i>{{$career->vacancy}}</i></h-3>
                                    <h-3 class="title-sm">Location: <i>{{$career->location}}</i></h-3>
                                 </div>
                                 <div class="d-flex align-items-center justify-content-between pb-3">
                                    <h3 class="title-sm">Published:
                                       <i>{{ \Carbon\Carbon::parse($career->publish_date)->format('d M Y') }}</i>
                                    </h3>
                                    <h3 class="title-sm text-danger">Deadline:
                                       <i>{{ \Carbon\Carbon::parse($career->deadline)->format('d M Y') }}</i>
                                    </h3>
                                 </div>

                                 <button class="select-btn-success w-45 m-0 view-job-btn" data-bs-toggle="modal"
                                    data-bs-target="#job-view-modal" data-id="{{ $career->id }}"
                                    data-title="{{ $career->title }}" data-company="{{ $career->company_name }}"
                                    data-email="{{ $career->email }}" data-phone="{{ $career->phone }}"
                                    data-location="{{ $career->location }}" data-vacancy="{{ $career->vacancy }}"
                                    data-publish="{{ \Carbon\Carbon::parse($career->publish_date)->format('d M Y') }}"
                                    data-deadline="{{ \Carbon\Carbon::parse($career->deadline)->format('d M Y') }}"
                                    data-description="{{ strip_tags($career->description) }}"
                                    data-logo="/storage/{{ $career->logo }}" data-image="/storage/{{ $career->image }}"
                                    data-responsibilities='@json(json_decode($career->responsibilities, true))'
                                    data-requirements='@json(json_decode($career->requirements, true))'>
                                    View JOB Details
                                 </button>

                                 <button class="apply-btn select-btn-warning w-50 m-0" data-id="{{ $career->id }}"
                                    data-title="{{ $career->title }}">
                                    Apply Now
                                 </button>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>
   <!-- Career Section End -->

   <!-- Job Details Modal -->
   <div class="modal fade" id="job-view-modal" tabindex="-1" aria-hidden="true" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header p-3">
               <h5 class="title-lg fs-20 fw-600">Job Details</h5>
            </div>
            <div class="modal-body p-0">
               <div class="card-body p-3">
                  <div class="d-flex align-items-center overflow-hidden w-100">
                     <div class="career-logo-box d-flex align-items-center justify-content-center rounded-3 p-3 bg-white">
                        <img src="" id="jobLogo" class="rounded-3" alt="img">
                     </div>
                     <div class="px-3 w-100">
                        <p class="title-lg pb-1 fs-18"><i>Company:</i> <span id="jobCompany"></span></p>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <a href="#" id="jobEmail" class="link-lg"></a>
                           <a href="#" id="jobPhone" class="link-lg"></a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between pt-2">
                           <p class="link-lg" id="jobAddress"></p>
                           <button class="badge-2 w-40 m-0 apply-btn2">Apply Now</button>
                        </div>
                     </div>
                  </div>
                  <div class="cm-group pt-4">
                     <h2 class="pb-1 fs-16 border-bottom">Job Context</h2>
                     <p class="sub-title-lg fs-13 pt-2 pb-3" id="jobDescription"></p>
                     <h2 class="pb-1 fs-16 border-bottom">Responsibilities</h2>
                     <ul id="jobResponsibilities"></ul>
                     <h2 class="pb-1 fs-16 border-bottom">Requirements</h2>
                     <ul id="jobRequirements"></ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Job Apply Modal -->
   <div class="modal fade" id="jobApplyModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Apply for Position: <span id="jobTitle"></span></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
               <form id="jobApplyForm" enctype="multipart/form-data">
                  <input type="hidden" name="career_id" id="applyCareerId">
                  <div class="form-group">
                     <label for="fullName" class="form-label">Full Name</label>
                     <input type="text" class="form-control" name="name" id="fullName" required>
                  </div>
                  <div class="form-group">
                     <label for="email" class="form-label">Email Address</label>
                     <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                  <div class="form-group">
                     <label for="phone" class="form-label">Phone Number</label>
                     <input type="tel" class="form-control" name="phone" id="phone" required>
                  </div>
                  <div class="form-group">
                     <label for="coverLetter" class="form-label">Cover Letter</label>
                     <textarea class="form-control" name="cover_letter" id="coverLetter" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                     <label for="resume" class="form-label">Upload CV/Resume</label>
                     <input class="form-control" type="file" name="cv" id="resume" accept=".pdf,.doc,.docx" required>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Submit Application</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

@endsection

@push('script')
   <script>
      $(document).ready(function () {
         // Card-এর Apply Now
         $(document).on('click', '.apply-btn', function () {
            const careerId = $(this).data('id');
            const jobTitle = $(this).data('title');
            $('#applyCareerId').val(careerId);
            $('#jobTitle').text(jobTitle);
            $('#jobApplyModal').modal('show');
         });

         // View Job Details (Details modal খোলার সময়)
         $(document).on('click', '.view-job-btn', function () {
            const $this = $(this);

            $("#jobCompany").text($this.data("company"));
            $("#jobEmail").text("Email: " + $this.data("email")).attr("href", "mailto:" + $this.data("email"));
            $("#jobPhone").text("Phone: " + $this.data("phone")).attr("href", "tel:" + $this.data("phone"));
            $("#jobAddress").text("Location: " + $this.data("location"));
            $("#jobDescription").text($this.data("description"));
            $("#jobLogo").attr("src", $this.data("logo"));

            // ✅ modal-এর Apply Now বাটনে fresh data বসাও (.data() দিয়ে)
            const $applyBtn2 = $("#job-view-modal .apply-btn2");
            $applyBtn2.removeData('id').removeData('title');   // পুরনো cache ক্লিয়ার
            $applyBtn2
               .data('id', $this.data('id'))
               .data('title', $this.data('title'))
               // (inspect করার সুবিধার জন্য attribute-ও আপডেট করা হল, optional)
               .attr('data-id', $this.data('id'))
               .attr('data-title', $this.data('title'));

            // Responsibilities
            const responsibilities = $this.data("responsibilities") || [];
            $("#jobResponsibilities").empty();
            $.each(responsibilities, function (_, item) {
               $("#jobResponsibilities").append(
                  `<li><i class="bx bx-log-in-circle bx-tada"></i> ${item}</li>`
               );
            });

            // Requirements
            const requirements = $this.data("requirements") || [];
            $("#jobRequirements").empty();
            $.each(requirements, function (_, item) {
               $("#jobRequirements").append(
                  `<li><i class="bx bx-log-in-circle bx-tada"></i> ${item}</li>`
               );
            });
         });

         // Details modal-এর Apply Now
         $(document).on('click', '.apply-btn2', function () {
            // যেহেতু ওপরের দিকে .data() দিয়ে সেট করেছি, এখানে .data() দিয়েই পড়ি
            const careerId = $(this).data('id');
            const jobTitle = $(this).data('title');
            $('#applyCareerId').val(careerId);
            $('#jobTitle').text(jobTitle);
            $('#job-view-modal').modal('hide');
            $('#jobApplyModal').modal('show');
         });

         // Submit Application (unchanged)
         $('#jobApplyForm').on('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            $.ajax({
               url: "{{ route('job.apply') }}",
               method: "POST",
               data: formData,
               processData: false,
               contentType: false,
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function (response) {
                  $('#jobApplyForm')[0].reset();
                  $('#jobApplyModal').modal('hide');
                  Swal.fire({ icon: 'success', title: 'Success', text: response.success });
               },
               error: function () {
                  Swal.fire({ icon: 'error', title: 'Oops...', text: 'Something went wrong!' });
               }
            });
         });
      });
   </script>
@endpush