@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid">

  <div id="carouselExampleIndicators" class="carousel slide row" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid w-100" style="height:400px" src="{{ asset('assets/front1.jpeg') }}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid w-100" style="height:400px" src="{{ asset('assets/front4.jpeg') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid w-100" style="height:400px" src="{{ asset('assets/front3.jpeg') }}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Our Advantages</h1>
  </div>

    <div class="row d-flex justify-content-center">
      <div class="col-lg-4" style="height:auto">
        <div class="col-lg-12" style="height:100px">
          <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="height:auto;margin-top:10px;margin-bottom:10px">
          <h2 style="text-align:center;">Advanced Your Skill</h2>
        </div>
        <div class="col-lg-12" style="height:auto">
          <p style="border-top:2px dashed black;text-align:center;padding:10px 30px;font-style:italic;">
            Join us will be the best solution for you to improve your skill in technology,
            you'll get exercise to handle so many type of job which is unconsciously increase
            your skill. We are a versed person in this part. We are very sure that we will the right
            person for you, so don't be hesitated with us.
          </p>
        </div>
      </div>
      <div class="col-lg-4" style="height:auto">
        <div class="col-lg-12" style="height:100px">
        <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="height:auto;margin:10px 0">
          <h2 style="text-align:center;">You'll Get Money and Point</h2>
        </div>
        <div class="col-lg-12" style="height:auto">
          <p style="border-top:2px dashed black;text-align:center;padding:10px 30px;font-style:italic;">
          Aside from you'll improve your skill. You'll get money from company which is posted a job
          that you take and you'll get coin from system based on criteria. The coin is very useful,
          cause it's can be used for you to get the more level of confidence from the related company, in
          other words it can make you easier to get a job.
          </p>
        </div>
      </div>
      <div class="col-lg-4" style="height:auto">
        <div class="col-lg-12" style="height:100px">
        <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="height:auto;margin:10px 0">
          <h2 style="text-align:center;">Expand Your Connection</h2>
        </div>
        <div class="col-lg-12" style="height:auto">
          <p style="border-top:2px dashed black;text-align:center;padding:10px 30px;font-style:italic;">
            Without you being aware, in the process of doing your task, you'll do a formal
            communication with person in company. So you get good communication lesson at a time
            you expand you connection. In the future of your career this part is one of the most important
            thing.
          </p>
        </div>
      </div>
    </div>

    <div class="col-lg-12" style="height:auto;margin-top:20px;">
      <h2 style="text-align:center;font-style:italic;font-weight:bold;margin-top:10px;padding:30px;">
        Your work is going to fill a whole part of your life, and the only way to be truly satisfied
        is to do what you believe is great work. And the only way to do great work is to love what you do
      </h2>
      <div class="col-lg-12 h4 d-flex justify-content-center">--Steve Jobs--</div>
      <div class="col-lg-12 d-flex justify-content-center">
        <div class="btn btn-primary" style="margin-top:10px;">&#8711;</div>
      </div>
    </div>
    
    <div class="row" style="height:auto;background:black">
      <div class="col-lg-12 h1" style="text-align:center;font-size:75px;color:white">Wngine News</div>
      
      <div class="col-lg-4" style="height:auto;padding:30px;">
        <div class="col-lg-12 h-100" style="border-radius:25px;background:white;">
          <div class="col-lg-12 h4" style="padding:10px;text-align:center;font-weight:bold;">Who’s developing quantum computers?</div>
          <hr>
          <div style="text-align:center;">
            Here are classical computing stalwarts and the newest one of startups 
            they are vying with for a piece of the quantum-computing future. This technology will bring us
            to the new era of IT that take more advantages for human actually. Many researcher
            make research about this technology
          </div>
          <hr>
          <button type="button" style="margin-bottom:20px;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Read More</button>
          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
             <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Who’s developing quantum computers?</h4>
                </div>
                <div class="modal-body">
                  <p>There are two main camps in the quantum computing development, 
                  says Ashish Nadkarni, Program Vice President of Computing Platforms, 
                  Worldwide Infrastructure at IDC. In the first camp are entrenched players from 
                  the world of classical computing. And in the second are quantum computing startups.
                  “It’s a highly fragmented landscape,” Nadkarni says. “Each company has its own approach 
                  to building a universal quantum computer and delivering it as a service.”
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
       </div>
      </div>
      <div class="col-lg-4" style="height:auto;padding:30px;">
        <div class="col-lg-12 h-100" style="border-radius:25px;background:white;">
          <div class="col-lg-12 h4" style="padding:10px;text-align:center;font-weight:bold;">What is blockchain?The most disruptive tech</div>
          <hr>
          <div style="text-align:center;">
          The distributed ledger technology, better known as blockchain, 
          has the potential to eliminate huge amounts of record-keeping,
          save money and disrupt IT in ways not seen since the internet arrived.
          Blockchain is poised to change IT in 
          much the same way open-source software.
          </div>
          <hr>
          <button type="button" style="margin-bottom:20px;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Read More</button>
          <!-- Modal -->
          <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog">
             <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">What is blockchain?The most disruptive tech</h4>
                </div>
                <div class="modal-body">
                  <p>
                  First and foremost, Blockchain is a public electronic ledger - similar to a 
                  relational database - that can be openly shared among disparate users and that 
                  creates an unchangeable record of their transactions, each one time-stamped 
                  and linked to the previous one. Each digital record or transaction in the thread
                  is called a block (hence the name), and it allows either an open or controlled set of users to participate in the electronic ledger. Each block is linked to a specific participant.
                  Blockchain can only be updated by consensus between participants
                  in the system, and when new data is entered, it can never be erased. 
                  The blockchain contains a true and verifiable record of each and every
                  transaction ever made in the system.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
       </div>
      </div>
      <div class="col-lg-4" style="height:auto;padding:30px;">
        <div class="col-lg-12 h-100" style="border-radius:25px;background:white;">
          <div class="col-lg-12 h4" style="padding:10px;text-align:center;font-weight:bold;">Tech Talk : The Effect Prepping for GDPR</div>
          <hr>
          <div style="text-align:center;">
          CSO's Michael Nadeau and Steve Ragan join Computerworld's Ken Mingis and IDG 
          Communications' Mark Lewis to look at what the new EU privacy rules mean. 
          They offer insights on how companies can prepare – and what happens if they don't.
          </div>
          <hr>
          <button type="button" style="margin-bottom:20px;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Read More</button>
          <!-- Modal -->
          <div id="myModal3" class="modal fade" role="dialog">
            <div class="modal-dialog">
             <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tech Talk: Prepping for GDPR</h4>
                </div>
                <div class="modal-body">
                  <p>
                  The General Data Protection Regulation (GDPR) (EU) 2016/679 is a regulation in 
                  EU law on data protection and privacy for all individuals within the European 
                  Union and the European Economic Area. It also addresses the export of personal 
                  data outside the EU and EEA. The GDPR aims primarily to give control to citizens 
                  and residents over their personal data and to simplify the regulatory environment 
                  for international business by unifying the regulation within the EU.[1]
                  Superseding the Data Protection Directive, the regulation contains provisions and 
                  requirements pertaining to the processing of personally identifiable information of 
                  data subjects inside the European Union. Business processes that handle personal data 
                  must be built with data protection by design and by default, meaning that personal 
                  data must be stored using pseudonymisation or full anonymisation, and use the highest-
                  possible privacy settings by default, so that the data is not available publicly without
                  explicit consent, and cannot be used to identify a subject without additional 
                  information stored separately. No personal data may be processed unless it is done 
                  under a lawful basis specified by the regulation, or if the data controller or processor 
                  has received explicit, opt-in consent from the data's owner. The data owner has the right 
                  to revoke this permission at any time.
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
       </div>
      </div>

      <div class="col-lg-12" style="border:1px solid white;height:150px;">
      </div>

    </div>

    <div class="row" style="background:#1c7776;height:auto;margin-top:10px;padding:50px;">
      <div class="col-lg-12 h1" style="margin-bottom:50px;font-size:75px;text-align:center;color:white;letter-spacing:5px;font-family: serif;">Our Contact</div>
      <div class="col-lg-4" style="">
        <div class="row" style="">
          <div class="row" style="margin: auto;">
            <img style="width:10%;height: 6%;margin: auto;" src="{{ asset('assets/phone.png') }}" alt="phone logo">

          </div>
        </div>
        <div class="row justify-content-center" style="height:auto">
          <div class="row justify-content-center" style="height:auto;">
            <center><h2 style="text-align:center;color:white;font-weight:bold">Phone</h2></center>
          </div>
        </div>
        <div class="col-lg-12" style="border-top:5px double white;height:250px;padding-top:30px;">
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Main Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">031-7321117</div>
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Branch Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">061-6320115</div>
        </div>
      </div>

      <div class="col-lg-4" style="">
        <div class="row " style="">
          <div class="row" style="margin: auto">
            <img style="width:10%;height: 6%;margin: auto;"  src="{{ asset('assets/location.png') }}" alt="phone logo">
          </div>
        </div>
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:auto;">
            <h2 style="text-align:center;color:white;font-weight:bold">Address</h2>
          </div>
        </div>
        <div class="col-lg-12" style="border-top:5px double white;height:250px;padding-top:30px;">
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Main Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Sidoarjo, East Java, Indonesia</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Jalan Makmur 8a, Komplek Indahri Blok B, No. 80</div>
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Branch Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Surabaya, East Java, Indonesia</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Jalan Kedongdoro 3a, Perumnas Blok 3c, No.78-79</div>
        </div>
      </div>

      <div class="col-lg-4" style="">
        <div class="row" style="">
          <div class="row" style="margin: auto">
            <img style="width:10%;height: 6%;margin: auto;"  src="{{ asset('assets/email.png') }}" alt="phone logo">
          </div>
        </div>
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:auto;">
            <h2 style="text-align:center;color:white;font-weight:bold">Email</h2>
          </div>
        </div>
        <div class="col-lg-12" style="border-top:5px double white;height:250px;padding-top:30px;">
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Main Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">wngine.noreply@gmail.com</div>
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Branch Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">branchwngine.noreply@gmail.com</div>
        </div>
      </div>

    </div>

</div>

@endsection
