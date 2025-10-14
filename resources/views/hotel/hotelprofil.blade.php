<x-app-layout>

    <style>
        .disabled {
            opacity: 0.5;
            /* Adjust the opacity as desired */
            pointer-events: none;
            /* Prevent pointer events */
        }

        .owl-carousel .item {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
            /* Adjust height as needed */
            overflow: hidden;
            background: #f4f4f4;
            /* Optional: Adds a light background for better visibility */
            border: 1px solid #ddd;
            /* Optional: Adds a border around each item */
        }

        .owl-carousel .item img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
    </style>

    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <div class="leftsidebar">

            @include('layouts.leftsidebar')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.mainnavbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Our Employees</h4> -->
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Hotel Images</h4>
                                            <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel owl-loaded owl-drag" id="owl-carousel-basic">
                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage" style="transform: translate3d(-1445px, 0px, 0px); transition: all 0.25s ease 0s; width: 3374px;">

                                                        @foreach ($hotelImages as $hotelImage)
                                                        <div class="owl-item cloned" style="width: 471.984px; margin-right: 10px;">
                                                            <div class="item">
                                                                <img src="{{ asset($hotelImage->file_url) }}" alt="">
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="mdi mdi-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="mdi mdi-chevron-right"></i></button></div>
                                                <div class="owl-dots disabled"></div>


                                            </div>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadimages">Upload Images</button>
                                            <div class="preview-item border-bottom mt-4">
                                                <div class="preview-item-content d-flex flex-grow">
                                                    <div class="flex-grow">
                                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                            <h6 class="preview-subject" id="vehiclenox">{{ $hotel->name }}</h6>

                                                            <p class="text-muted text-small" id="hotelid" style="display: none;">{{$hotel->id }}</p>
                                                        </div>
                                                        <p class="text-muted">{{ $hotel->type }}</p>
                                                        <p class="text-muted">{{ $hotel->location }}</p>
                                                        <p class="text-muted text-small"> {{ $hotel->province?->name_en ?? 'N/A' }} </p>
                                                        <p class="text-muted text-small">{{ $hotel->district?->name_en ?? 'N/A' }} / {{ $hotel->city?->name_en ?? 'N/A' }}</p>
                                                        <p class="text-muted text-small">{{ $hotel->content }}
                                                        </p>
                                                    </div>


                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="d-flex flex-row justify-content-between">
                                                <h4 class="card-title p-2 d-flex">Price Details</h4>
                                            </div>
                                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                                <div class="text-md-center text-xl-left">
                                                    <h6 class="mb-1">Room Only </h6>
                                                </div>
                                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                                    <h6 class="font-weight-bold mb-0">{{ number_format($hotel->roomonlyprice,2) }}</h6>
                                                </div>
                                            </div>
                                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                                <div class="text-md-center text-xl-left">
                                                    <h6 class="mb-1">BB Price </h6>
                                                </div>
                                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                                    <h6 class="font-weight-bold mb-0">{{ number_format($hotel->bbprice,2) }}</h6>
                                                </div>
                                            </div>
                                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                                <div class="text-md-center text-xl-left">
                                                    <h6 class="mb-1">HB Price </h6>
                                                </div>
                                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                                    <h6 class="font-weight-bold mb-0">{{ number_format($hotel->hbprice,2) }}</h6>
                                                </div>
                                            </div>
                                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                                <div class="text-md-center text-xl-left">
                                                    <h6 class="mb-1">FB Price</h6>
                                                </div>
                                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                                    <h6 class="font-weight-bold mb-0">{{ number_format($hotel->fbprice,2) }}</h6>
                                                </div>
                                            </div>
                                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                                <div class="text-md-center text-xl-left">
                                                    <h6 class="mb-1">All Inclusive Price</h6>
                                                </div>
                                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                                    <h6 class="font-weight-bold mb-0">{{ number_format($hotel->allinclusiveprice,2) }}</h6>
                                                </div>
                                            </div>

                                            <a href="/hotel/{{ $hotel->id }}" class="btn btn-success">Edit Prices</a>
                                        </div>
                                    </div>

                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    <div class="modal fade" id="uploadimages" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Images</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="contact-form-validated form-one"
                    action="/uploadhotelimages"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Hotel ID <span class="acspan">*</span></label>
                        <input type="text" class="form-control" id="hotelid" name="hotelid" style="color: gray;" placeholder="Hotel ID" value="{{ $hotel->id }}">
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputUsername1">You can upload multiple images using this file chooser</label>
                            <input type="file" name="images[]" class="image-upload-input" accept="image/*" multiple>
                            <button type="button" class="image-upload-btn">Choose Images</button>
                            <span class="selected-files">No files chosen</span>
                            <div class="image-previews"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                        <button type="submit" class="btn btn-primary">Upload Images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>

<script>
    const imageInput = document.querySelector('.image-upload-input');
    const uploadBtn = document.querySelector('.image-upload-btn');
    const selectedFilesText = document.querySelector('.selected-files');
    const imagePreviewContainer = document.querySelector('.image-previews');

    let totalImages = 0;

    uploadBtn.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', (event) => {
        const selectedFiles = event.target.files;

        if (selectedFiles.length > 0) {
            selectedFilesText.style.display = 'none'; // Hide "No files chosen"
        }

        Array.from(selectedFiles).forEach(file => {
            const reader = new FileReader();

            reader.onload = (e) => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('image-preview');
                imagePreviewContainer.appendChild(img);
            };

            reader.readAsDataURL(file);
        });

        totalImages += selectedFiles.length;
        uploadBtn.textContent = `Add More Images (${totalImages})`;
    });
</script>

<script>
    function refresh() {
        location.reload();
    }
</script>