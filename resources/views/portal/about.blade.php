@extends('layouts.portal')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="card-wrap">
                <!-- Historical Images Gallery -->
                <div class="row mb-4">
                    <div class="col-md-6 col-lg-3 mb-3">
                        <img src="{{ asset('images/about/photo-2.jpg') }}" alt="Old GHCKB Building" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <img src="{{ asset('images/about/photo-1.jpg') }}" alt="Historical Photo 1" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <img src="{{ asset('images/about/photo-2.jpg') }}" alt="Historical Photo 2" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <img src="{{ asset('images/about/photo-4.jpg') }}" alt="Historical Photo 4" class="img-fluid rounded">
                    </div>
                </div>

                <!-- History Content -->
                <div class="row">
                    <div class="col-12">
                        <!-- History Section -->
                        <div class="mb-5">
                            <h2 class="h3 fw-bold mb-4">HISTORY</h2>
                            
                            <p class="mb-3">
                                The Kohima Bench of the Gauhati High Court was inaugurated as a Circuit Bench on 
                                1st December 1972. The inaugural function was attended by the then Chief 
                                Minister of Nagaland Dr. Hokishe Sema, the Hon'ble Mr. Justice M.C. Pathak and the 
                                Hon'ble Mr. Justice Sarma, the then Advocate General Mr. S.K. Gosh and a host of 
                                other dignitaries along with members of the Bar and the legal fraternity.
                            </p>

                            <p class="mb-3">
                                In exercise of the power conferred by sub-section (2) of section 31 of the 
                                North Eastern Areas (Reorganisation Act, 1971 (81 of 1971), the President of India, 
                                after consultation with the Chief Justice of the Gauhati High Court and the 
                                Governor of Nagaland was pleased to declare a Permanent Bench with the strength of 2 
                                (two) permanent station Judges at Kohima. Thereafter by Notification No. 
                                GSR.73(E) dated 7-2-1990, the Kohima Bench of the Gauhati High Court was declared a 
                                Permanent Bench. The Permanent Bench known as the Kohima Bench was subsequently 
                                inaugurated by Hon'ble Mr. Justice Subyasachi Mukherji, the then Chief Justice of 
                                India on the 10th February 1990.
                            </p>

                            <p class="mb-3">
                                The foundation stone for a new High Court of Nagaland was laid on the 21st May 2007 
                                by Hon'ble Shri Justice K.G. Balakrishnan, the then Chief Justice of India 
                                in the presence of Dr. H.R Bhardwaj, the then Hon'ble Union Minister of Law & 
                                Justice, Shri Neiphiu Rio, the Hon'ble Chief Minister of Nagaland, Hon'ble Shri 
                                Justice H.K. Sema, Judge Supreme Court of India and Hon'ble Shri Justice Jasti 
                                Chelameswar, the then Chief Justice of Gauhati High Court at Meriema on the 
                                outskirts of Kohima.
                            </p>

                            <p class="mb-0">
                                The Golden Jubilee of establishment of the Kohima Bench was commemorated on 
                                1st of December 2022 upon completion of 50 years.
                            </p>
                        </div>

                        <!-- About Section -->
                        <div>
                            <h2 class="h3 fw-bold mb-4">ABOUT</h2>
                            
                            <p class="mb-3">
                                Nagaland, situated in the extreme North East of India is the beautiful land of 
                                the Nagas - an amalgamation of several tribes of Mongoloid descent whose people 
                                are simple, honest and truthful. The Nagas had a rudimentary system of delivering 
                                justice based on simplicity and truthfulness. This customary law was handed 
                                down the generations solely through the word of mouth differing in usage and 
                                practice among the various tribes. Though still unwritten, it continues to be 
                                practised in the village level for resolving minor disputes.
                            </p>
                            
                            <p class="mb-3">
                                Its relevance was such that when the Nagaland state was inaugurated, the people 
                                fiercely demanded its protection from the Indian system of laws. As such, the 
                                Constitution of India has a special provision Article 371(A) which protects the 
                                Naga customary laws. However, with the advent of Indian system of governance, it 
                                became clear that Naga customary laws would not fully cater to the needs of the 
                                people.
                            </p>

                            <p class="mb-0">
                                Thus the need to fill this gap began with the inauguration of the Circuit Bench 
                                of the Gauhati High Court at the capital Kohima on the 1st of December 1972.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection