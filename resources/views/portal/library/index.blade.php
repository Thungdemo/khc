@extends('layouts.portal')
@section('content')
<div class="container site-main">
    <!-- Header Section -->
    <div class="mb-4">
        <h2 class="mb-1 fw-bold">GHCKB: Library</h2>
        <p class="hc-text-muted mb-0">Gauhati High Court Kohima Bench Library Services and Resources</p>
    </div>

    <!-- Library Banner -->
    <div class="mb-4">
        <img src="{{asset('images/library-banner.png')}}" alt="Library Banner" class="img-fluid w-100 rounded shadow-sm" style="height: 400px; object-fit: cover;">
    </div>

    <!-- Horizontal Tabs -->
    <div class="card-wrap">
        <ul class="nav nav-tabs border-bottom small" id="libraryTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About Us</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="library-management-tab" data-bs-toggle="tab" data-bs-target="#library-management" type="button" role="tab">Library Management Software</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="legal-databases-tab" data-bs-toggle="tab" data-bs-target="#legal-databases" type="button" role="tab">Legal Databases</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="state-publications-tab" data-bs-toggle="tab" data-bs-target="#state-publications" type="button" role="tab">State Government Publications</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="swamys-compilation-tab" data-bs-toggle="tab" data-bs-target="#swamys-compilation" type="button" role="tab">Swamy's Compilation</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="other-collections-tab" data-bs-toggle="tab" data-bs-target="#other-collections" type="button" role="tab">Other Collections</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="important-links-tab" data-bs-toggle="tab" data-bs-target="#important-links" type="button" role="tab">Important Links</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact Us</button>
            </li>
        </ul>

        <div class="tab-content p-4" id="libraryTabContent">
            <!-- About Us Tab -->
            <div class="tab-pane fade show active" id="about" role="tabpanel">
                <h5 class="fw-bold mb-3">About Us</h5>
                <div class="mb-4 small">
                    <p class="mb-3">
                        The Judges Library at Gauhati High Court, Kohima Bench was established on 1st December, 1972 
                        the establishment of which marks a great step towards accessibility, ready reference and up-to-date 
                        availability of legal books from National publications to regional publications.
                    </p>
                    <p class="mb-3">
                        Apart from the Library at the Court premises, we have two residential libraries at the three Judge's 
                        bungalow managed by the Library staffs at all times. The High Court Library not only provides 
                        books and references both from online and offline database to the Hon'ble Judges but it is also 
                        accessible by the Learned Advocates of the bar.
                    </p>
                    <p class="mb-4">
                        We provide reading space for anyone that wishes to refer in-house materials during working hours. 
                        Library Staffs are also deputed in each Court during Court Proceedings to provide the cited books 
                        and other materials to Hon'ble Judges at the time of hearing in the Courts.
                    </p>

                    <h6 class="fw-semibold mb-2">Working Days:</h6>
                    <p class="mb-3">The library will be open from Monday- Friday & on 1st, 3rd and 5th Saturday of each month except on National Holidays and during vacations.</p>

                    <h6 class="fw-semibold mb-2">Working hours:</h6>
                    <p class="mb-1"><strong>Summer:</strong> From 09:45 A.M. to 5:00 P.M. on all working days.</p>
                    <p class="mb-3"><strong>Winter:</strong> From 09:45 A.M. to 4:30 P.M. on all working days.</p>

                    <h6 class="fw-semibold mb-2">Official Email:</h6>
                    <p class="mb-0">judgeslibrarykohimabench@gmail.com</p>
                </div>
            </div>

            <!-- Library Management Software Tab -->
            <div class="tab-pane fade" id="library-management" role="tabpanel">
                <h5 class="fw-bold mb-3">Library Management Software</h5>
                <div class="mb-4">
                    <p class="mb-3">
                        The High Court Library has been computerized with the help of KOHA which is an open source e-platform.
                    </p>
                </div>
            </div>

            <!-- Legal Databases Tab -->
            <div class="tab-pane fade" id="legal-databases" role="tabpanel">
                <h5 class="fw-bold mb-3">Legal Databases</h5>
                
                <!-- Online Database Section -->
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2">1. Online Database</h6>
                    <ul class="list-unstyled mb-0" style="line-height: 1.3;">
                        <li class="mb-1 small">• Manupatra Online Legal Database</li>
                        <li class="mb-1 small">• Gauhati Law Times from 1995-till date</li>
                        <li class="mb-1 small">• SCC Online from 1969-till date</li>
                        <li class="mb-1 small">• Nagaland Law Journal (2023-)</li>
                        <li class="mb-1 small">• SCC online Web edition Platinum from 1969 till date</li>
                    </ul>
                </div>

                <!-- Offline Database Section -->
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2">2. Offline Database</h6>
                    <p class="mb-2 small fw-bold">Important publications</p>
                    <ul class="list-unstyled mb-0" style="line-height: 1.3;">
                        <li class="mb-1 small">• Gauhati Law Times - Mrinal Kumar Chowdhury (1995 - till date)</li>
                        <li class="mb-1 small">• Gauhati Law Referencer - Mrinal Kumar Chowdhury (2008 - )</li>
                        <li class="mb-1 small">• Gauhati Law Reports - Ashok Saraf (1981 - till date)</li>
                        <li class="mb-1 small">• Gauhati Law Journal - Ashok Kumar Maheshwari ( 1988 - till date)</li>
                        <li class="mb-1 small">• North East Judgments - Dr B.P. Todi (2011-2018) - till date)</li>
                        <li class="mb-1 small">• Digest of North-East Judgments - Dr. B.P. Todi (2011-2018)</li>
                        <li class="mb-1 small">• Gauhati High Court Rules - Mrinal Kumar Chowdhury</li>
                        <li class="mb-1 small">• Gauhati Law Times - (1995 - till date)</li>
                        <li class="mb-1 small">• Supreme Court Cases - Surendra Malik (1969- till date)</li>
                        <li class="mb-1 small">• All India Reporter Supreme Court - S.W.Chitaley (1950 - till date)</li>
                        <li class="mb-1 small">• All India Reporter States - S.W.Chitaley (1914 - till date)</li>
                        <li class="mb-1 small">• AIR SCW - V.R.Manohar (1992- till date)</li>
                        <li class="mb-1 small">• Criminal Law Journal - V.R.Manohar (1971- till date)</li>
                        <li class="mb-1 small">• AIR Manual Civil & Criminal - Manohar (1934)</li>
                        <li class="mb-1 small">• Services Law Reporter - Balvinder Singh Chawla ( 2011- till date)</li>
                        <li class="mb-1 small">• Transport and Accident Cases - S.K. Sodhi (1977-till date)</li>
                        <li class="mb-1 small">• Nagaland Law Journal (2023- )</li>
                    </ul>
                </div>
            </div>

            <!-- State Government Publications Tab -->
            <div class="tab-pane fade" id="state-publications" role="tabpanel">
                <h5 class="fw-bold mb-3">State Government Publications</h5>
                
                <!-- Government Orders & Notifications Section -->
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2">Government Orders & Notifications</h6>
                    <ul class="list-unstyled mb-0" style="line-height: 1.3;">
                        <li class="mb-1 small">• Government Orders & Notifications - Dept. of Personnel & Administrative Reforms</li>
                        <li class="mb-1 small">• The Nagaland Rules of Executive Business - Dept. of P & AR</li>
                        <li class="mb-1 small">• The Nagaland Government Servants Conduct Rules, 1968 Dept. of P & AR</li>
                        <li class="mb-1 small">• The Nagaland Health Services Rules, 1979 Dept. of P & AR</li>
                        <li class="mb-1 small">• The Nagaland Service (Discipline and Appeal) Rules, 1967 Dept. of P & AR</li>
                        <li class="mb-1 small">• Rules for the Administration of Justice and Police in Nagaland, 2008 - Zelre Angami.</li>
                        <li class="mb-1 small">• Nagaland Village Empowering Laws (Village Council Act, 2008) - Zelre Angami.</li>
                        <li class="mb-1 small">• Nagaland Juvenile Justice (Care & protection of children ) Rules 2017 - Dept. of Social Welfare</li>
                    </ul>
                </div>
            </div>

            <!-- Swamy's Compilation Tab -->
            <div class="tab-pane fade" id="swamys-compilation" role="tabpanel">
                <h5 class="fw-bold mb-3">Swamy's Compilation</h5>
                
                <!-- FRSR Parts Section -->
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2">FRSR (Fundamental Rules and Supplementary Rules)</h6>
                    <ul class="list-unstyled mb-0" style="line-height: 1.3;">
                        <li class="mb-1 small">• FRSR PART-I - General Rules</li>
                        <li class="mb-1 small">• FRSR PART-II - Travelling Allowances</li>
                        <li class="mb-1 small">• FRSR PART-III - Leave Rules</li>
                        <li class="mb-1 small">• FRSR PART-IV - Dearness Allowances</li>
                        <li class="mb-1 small">• FRSR PART-V - GPF Rules</li>
                    </ul>
                </div>
            </div>

            <!-- Other Collections Tab -->
            <div class="tab-pane fade" id="other-collections" role="tabpanel">
                <h5 class="fw-bold mb-3">Other Collections</h5>
                
                <!-- Collections List -->
                <div class="mb-3">
                    <ul class="list-unstyled mb-0" style="line-height: 1.3;">
                        <li class="mb-1 small">• Commentaries</li>
                        <li class="mb-1 small">• Digests</li>
                        <li class="mb-1 small">• Manuals</li>
                        <li class="mb-1 small">• Encyclopedias</li>
                        <li class="mb-1 small">• Bare Acts</li>
                        <li class="mb-1 small">• Acts</li>
                        <li class="mb-1 small">• Laws</li>
                        <li class="mb-1 small">• Rules</li>
                        <li class="mb-1 small">• References</li>
                        <li class="mb-1 small">• Codes</li>
                        <li class="mb-1 small">• Dictionaries</li>
                        <li class="mb-1 small">• E-Journals</li>
                        <li class="mb-1 small">• The Nagaland Gazette</li>
                        <li class="mb-1 small">• Magazines and newspapers</li>
                    </ul>
                </div>
            </div>

            <!-- Important Links Tab -->
            <div class="tab-pane fade" id="important-links" role="tabpanel">
                <h5 class="fw-bold mb-3">Important Links</h5>
                
                <!-- Important Links List -->
                <div class="mb-3">
                    <ul class="list-unstyled mb-0" style="line-height: 1.3;">
                        <li class="mb-2 small">
                            <a href="https://ndl.iitkgp.ac.in/" target="_blank" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                National Digital Library of India
                            </a>
                        </li>
                        <li class="mb-2 small">
                            <a href="https://main.sci.gov.in/library" target="_blank" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                The Supreme Court of India Judges Library
                            </a>
                        </li>
                        <li class="mb-2 small">
                            <a href="https://nagaland.gov.in/gazette" target="_blank" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                Nagaland eGazette
                            </a>
                        </li>
                        <li class="mb-2 small">
                            <a href="https://nagaland.gov.in/acts-rules" target="_blank" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                Acts and Rules of Nagaland
                            </a>
                        </li>
                        <li class="mb-2 small">
                            <a href="https://dsal.uchicago.edu/digicoll/lawcommission/" target="_blank" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                Digital Supreme Courts Reports
                            </a>
                        </li>
                        <li class="mb-2 small">
                            <a href="https://www.indkanoon.org/" target="_blank" class="text-decoration-none d-flex align-items-center">
                                <i class="bi bi-box-arrow-up-right me-2 text-primary"></i>
                                Indian Kanoon- Search engine for Indian Law
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact Us Tab -->
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <h5 class="fw-bold mb-3">Contact Us</h5>
                <div class="mb-4">
                    <h6 class="fw-semibold mb-3">Library Staff</h6>
                    
                    <!-- Librarian cum Research Officer -->
                    <div class="mb-3 p-3 border rounded">
                        <h6 class="fw-semibold mb-2">Librarian cum Research Officer</h6>
                        <p class="mb-1 small"><strong>Name:</strong> Mr. K. Vungthungo Ezung</p>
                        <p class="mb-1 small"><strong>Phone Number:</strong> 9612292704</p>
                        <p class="mb-0 small"><strong>Email:</strong> vungthungo[at]gmail[dot]com</p>
                    </div>

                    <!-- Deputy Librarian -->
                    <div class="mb-3 p-3 border rounded">
                        <h6 class="fw-semibold mb-2">Deputy Librarian</h6>
                        <p class="mb-1 small"><strong>Name:</strong> Ms. Sangwamenla</p>
                        <p class="mb-1 small"><strong>Phone Number:</strong> 7005605712</p>
                        <p class="mb-0 small"><strong>Email:</strong> sangwamen13[at]gmail[dot]com</p>
                    </div>

                    <!-- Librarian Assistant -->
                    <div class="mb-3 p-3 border rounded">
                        <h6 class="fw-semibold mb-2">Librarian Assistant</h6>
                        <p class="mb-1 small"><strong>Name:</strong> Ms. Chubasangla Imchen</p>
                        <p class="mb-1 small"><strong>Phone Number:</strong> 9089257310</p>
                        <p class="mb-0 small"><strong>Email:</strong> chubasanglaimchen93[at]gmail[dot]com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection