<?php require "login/loginheader.php"; ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">

    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="js/bootstrap-notify.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
      <link href="css/animate.css" rel="stylesheet">
      <link href="css/jquery-confirm.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css">  </head>

        <script src="js/knockout-3.4.0.js"></script>
        <script src="js/jquery-confirm.js"></script>

  <body>
  <header class="navbar navbar-fixed-top navbar-brand"><h3>Air Booking</h3></header>
  <header class="page-header"></header>
    <div class="container">

        <div class="row">
            <button type="button" class="btn btn-info btn-lg center-block"
                    data-toggle="modal" data-target="#bookTicketModal">
                Book a ticket</button>
            <h4>Your Previous Bookings</h4>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Booking Date</th>
                    <th>Flight Date</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Actions</th>
                </tr>

                <tbody data-bind="foreach: tickets">
                <tr>
                    <td data-bind="text: id"></td>
                    <td data-bind="text: booking_date"></td>
                    <td data-bind="text: flight_date"></td>
                    <td data-bind="text: loc_from"></td>
                    <td data-bind="text: loc_to"></td>
                    <td>
                    <button type="button" class="btn btn-danger" data-bind="click: $parent.cancelTicket">Cancel</button>
                    </td>
                </tr>
                </tbody>


            </table>

            <div class="form-signin">

                <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
            </div>
        </div>


    </div> <!-- /container -->

  <!-- Modal -->
  <div class="modal fade " id="bookTicketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body" style="min-height: 300px">
                  <form class="form">
                      <div class="form-group">
                          <label for="InputFrom">From:</label>
                          <input type="text" required data-bind="value: inputFrom" name="from" class="form-control" id="inputfrom" list="airports" placeholder="From">
                      </div>
                      <div class="form-group">
                          <label for="InputTo">To</label>
                          <input type="text" required data-bind="value: inputTo" name="to" class="form-control" id="inputto" placeholder="To" list="airports">
                      </div>
                      <div class="form-group">
                          <label for="datePicker">Date of journey</label>
                          <input type="text" required data-bind="value: date" name="date" class="form-control" id="datePicker" placeholder="Date">
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" data-bind="click: bookTicket" id="ticketSubmit">Save changes</button>
              </div>
          </div>
      </div>
  </div>

    <datalist id="airports">
  <option value="Indira Gandhi International Airport                    ">
  <option value="Chhatrapati Shivaji International Airport">
  <option value="Kempegowda International Airport">
  <option value="Chennai International Airport">
  <option value="Dabolim Airport">
  <option value="HAL Airport">
  <option value="Trivandrum International Airport">
  <option value="Cochin International Airport">
  <option value="Netaji Subhash Chandra Bose International Airport">
  <option value="Rajiv Gandhi International Airport">
  <option value="Pune Airport">
  <option value="Sardar Vallabhbhai Patel International Airport">
  <option value="Jaipur International Airport">
  <option value="Mangalore International Airport">
  <option value="Sri Guru Ram Dass Jee International Airport">
  <option value="Begumpet Airport">
  <option value="Vadodara Airport">
  <option value="Devi Ahilyabai Holkar Airport">
  <option value="Lal Bahadur Shastri Airport">
  <option value="Calicut International Airport">
  <option value="Coimbatore International Airport">
  <option value="Lokpriya Gopinath Bordoloi International Airport">
  <option value="Jodhpur Airport">
  <option value="Chandigarh Airport">
  <option value="Madurai Airport">
  <option value="Vishakhapatnam Airport">
  <option value="Juhu Aerodrome">
  <option value="Lok Nayak Jayaprakash Airport">
  <option value="Bagdogra Airport">
  <option value="Surat Airport">
  <option value="Maharana Pratap Airport">
  <option value="Aurangabad Airport">
  <option value="Biju Patnaik Airport">
  <option value="Bhuj Airport">
  <option value="Vijayawada Airport">
  <option value="Raipur Airport">
  <option value="Sri Sathya Sai Airport">
  <option value="Darbhanga Airport">
  <option value="Gondia Airport">
  <option value="Raja Bhoj International Airport">
  <option value="Imphal Airport">
  <option value="Birsa Munda Airport">
  <option value="Agartala Airport">
  <option value="Leh Kushok Bakula Rimpochee Airport">
  <option value="Sheikh ul Alam Airport">
  <option value="Tirupati Airport">
  <option value="Khajuraho Airport">
  <option value="Kullu Manali Airport">
  <option value="Ambala Air Force Station">
  <option value="Allahabad Airport">
  <option value="Harihar Airport">
  <option value="Baramati Airport">
  <option value="Chaudhary Charan Singh International Airport">
  <option value="Dr. Babasaheb Ambedkar International Airport">
  <option value="Rajkot Airport">
  <option value="Tiruchirapally Civil Airport Airport">
  <option value="Jammu Airport">
  <option value="Bhavnagar Airport">
  <option value="Jamnagar Airport">
  <option value="Gaya Airport">
  <option value="Dehradun Airport">
  <option value="Jorhat Airport">
  <option value="Gandhinagar Airport">
  <option value="Porbandar Airport">
  <option value="Vir Savarkar International Airport">
  <option value="Rajahmundry Airport">
  <option value="Hubli Airport">
  <option value="Shimla Airport">
  <option value="Jamshedpur Airport">
  <option value="Bidar Air Force Station">
  <option value="Rourkela Airport">
  <option value="Bhatinda Air Force Station">
  <option value="Pathankot Air Force Station">
  <option value="Pondicherry Airport">
  <option value="Agra Airport">
  <option value="Bellary Airport">
  <option value="Dundigul Air Force Academy">
  <option value="Kota Airport">
  <option value="Willingdon Island Air Base">
  <option value="Nagarjuna Sagar Airport">
  <option value="Bokaro Airport">
  <option value="Bhilai Airport">
  <option value="Raedhanpur Airport">
  <option value="Bhiwani Airport">
  <option value="Nuagaon Airport">
  <option value="Patiala Airport">
  <option value="Uttarlai Airport">
  <option value="Hakimpet Airport">
  <option value="Fursatganj Airport">
  <option value="Kalaikunda Air Force Station">
  <option value="Chakeri Air Force Station">
  <option value="Ozar Airport">
  <option value="Coimbatore Air Force Station">
  <option value="Yelahanka Air Force Station">
  <option value="Deoghar Airstrip">
  <option value="kanha">
  <option value="Barbil Aerodrome (JSPL)">
  <option value="KEONJHAR AIRPORT">
  <option value="Nadirgul Airport">
  <option value="GAUCHER">
  <option value="Amreli Airstrip">
  <option value="Bhagalpur Airport">
  <option value="Kopal,Hospet Airport">
  <option value="Koppal Aerodrome">
  <option value="Shibpur Airstrip">
  <option value="Belgaum Airport">
  <option value="Tezpur Airport">
  <option value="Kolhapur Airport">
  <option value="Jabalpur Airport">
  <option value="Satna Airport">
  <option value="Kanpur Airport">
  <option value="Tuirial Airfield">
  <option value="Dimapur Airport">
  <option value="Gwalior Airport">
  <option value="North Lakhimpur Airport">
  <option value="Shillong Airport">
  <option value="Silchar Airport">
  <option value="Diu Airport">
  <option value="Dibrugarh Airport">
  <option value="Car Nicobar Air Force Station">
  <option value="Cuddapah Airport">
  <option value="Along Airport">
  <option value="Zero Airport">
  <option value="Dhanbad Airport">
  <option value="Muzaffarpur Airport">
  <option value="Bilaspur Airport">
  <option value="Daman Airport">
  <option value="Safdarjung Airport">
  <option value="Keshod Airport">
  <option value="Kangra Airport">
  <option value="Hissar Airport">
  <option value="Sirsa Air Force Station">
  <option value="Udhampur Air Force Station">
  <option value="Agatti Airport">
  <option value="Akola Airport">
  <option value="Ratnagiri Airport">
  <option value="Guna Airport">
  <option value="Ludhiana Airport">
  <option value="Jaisalmer Airport">
  <option value="Kailashahar Airport">
  <option value="Panagarh Air Force Station">
  <option value="Bareilly Air Force Station">
  <option value="Nal Airport">
  <option value="Gorakhpur Airport">
  <option value="Hashimara Air Force Station">
  <option value="Kandla Airport">
  <option value="Pantnagar Airport">
  <option value="Salem Airport">
  <option value="Campbell Bay Airport">
  <option value="Machuka Advanced Landing Ground">
  <option value="Vijaynagar Advanced Landing Ground">
  <option value="Sookerating Airport">
  <option value="Rupsi India Airport">
  <option value="Giridih Airport">
  <option value="Daltonganj Airport">
  <option value="Purnea Airport">
  <option value="Raxaul Airport">
  <option value="Deesa Airport">
  <option value="Bhilwara Airport">
  <option value="Karnal Airport">
  <option value="Kalka Airport">
  <option value="Chakulia Airport">
  <option value="Thoise Airport">
  <option value="Kargil Airport">
  <option value="Fukche Advanced Landing Ground">
  <option value="Awantipur Air Force Station">
  <option value="Daulat Beg Oldi Advanced Landing Ground">
  <option value="Chanda Airport">
  <option value="Karad Airport">
  <option value="Jalgaon Airport">
  <option value="Dhulia Airport">
  <option value="Birlagram Airport">
  <option value="Sidhi Airport">
  <option value="Dhana Airport">
  <option value="Amla Airport">
  <option value="Nimach Airport">
  <option value="Burhar Airport">
  <option value="Ratlam Airport">
  <option value="Thuniabhand Airport">
  <option value="Band Tal Airport">
  <option value="Cuttack Airport">
  <option value="Jharsuguda Airport">
  <option value="Utkela Airport">
  <option value="Jallowal Airport">
  <option value="Adampur Air Force Station">
  <option value="Halwara Air Force Station">
  <option value="Ondwa Airport">
  <option value="Phalodi Airport">
  <option value="Sirohi Airport">
  <option value="Banswara Airport">
  <option value="Abu Road Airport">
  <option value="Suratgarh New Airport">
  <option value="Jhunjhunu Airport">
  <option value="Pilani New Airport">
  <option value="Nagaur Airport">
  <option value="Kovilpatti Airport">
  <option value="Tuticorin Southwest Airport">
  <option value="Hosur Airport">
  <option value="Arkonam Airport">
  <option value="Kamalpur Airport">
  <option value="Muirpur Airport">
  <option value="Meerut Sw Airport">
  <option value="Kalyanpur Airport">
  <option value="Bharkot Airport">
  <option value="Akbarpur Airport">
  <option value="Pithorgarh Airport">
  <option value="Hindon Air Force Station">
  <option value="Jhansi Airport">
  <option value="Sarsawa Air Force Station">
  <option value="Burnpur Airport">
  <option value="Lengpui Airport">
  <option value="Balurghat Airport">
  <option value="Barrackpore Air Force Station">
  <option value="Behala Airport">
  <option value="Tambaram Air Force Station">
  <option value="Chabua Air Force Station">
  <option value="Dunakonda Airport">
  <option value="Jagdalpur Airport">
  <option value="Jeypore Airport">
  <option value="Khowai Airport">
  <option value="Lalitpur Airport">
  <option value="Murod Kond Airport">
  <option value="Bakshi Ka Talab Air Force Station">
  <option value="Malda Airport">
  <option value="Mysore Airport">
  <option value="Nanded Airport">
  <option value="Nawapara Airport">
  <option value="Neyveli Airport">
  <option value="Pasighat Airport">
  <option value="Rajouri Airport">
  <option value="Ramnad Naval Air Station">
  <option value="Chorhata Airport">
  <option value="Hirakud Airport">
  <option value="Solapur Airport">
  <option value="Tezu Airport">
  <option value="Tanjore Air Force Base">
  <option value="Bentayan Airport">
  <option value="Vellore Airport">
  <option value="Warangal Airport">
  <option value="Tawang Air Force Station">
  <option value="Siachen Glacier AFS Airport">
  <option value="Cooch Behar Airport">
  <option value="Walong Advanced Landing Ground">
  <option value="Itanagar (Naharlagun)">
  <option value="Itanagar (Naharlagun)">
  <option value="Ledo Airfield">
  <option value="Dinjan Airfield">
  <option value="Madhubani Airport">
  <option value="Madhubani Airport">
  <option value="saharsa airstrip">
  <option value="Raigarh Airport (JSPL)">
  <option value="Annandale Helipad">
  <option value="Ajog Helipad">
  <option value="Noamundi Airport">
  <option value="Leh Helipad">
  <option value="Jakkur Airfield">
  <option value="Vijayanagar Aerodrome (JSW)">
  <option value="Baldota Koppal Aerodrome">
  <option value="Perunad Helipad">
  <option value="Kavaratti Helipad">
  <option value="Baljek Airport">
  <option value="Koirengei Airstrip">
  <option value="Khargon Govt. Airstrip">
  <option value="CHINDWARA AIRFIELD">
  <option value="Thuampui Helipad">
  <option value="Pukpui Helipad">
  <option value="Lunglei Helipad">
  <option value="Vairengte Helipad">
  <option value="Angul Airport (JSPL)">
  <option value="Jajpur ( Sukinda ) Airstrip">
  <option value="Vedanta Lanjigarh Airstrip">
  <option value="Salwas Airport">
  <option value="Gangtok Helipad">
  <option value="Pakyong Airport (Under Construction)">
  <option value="Kayathar Airstrip">
  <option value="Chettinad Airstrip">
  <option value="Ulundurpet Airstrip">
  <option value="Cholavaram Airstrip">
  <option value="Sultanpur">
  <option value="Dudhkundi Airfield">
  <option value="Piardoba Airfield">
  <option value="Bishnupur Airfield">
  <option value="Guskhara Airfield">
  <option value="Pandaveswar Airfield">
  <option value="Aamby Valley Airport">
  <option value="Akli Airport">
  <option value="Dhanipur Airstrip">
  <option value="Amravati (Belora) Airstrip">
  <option value="Shri Guru Ram Dass Ji International Airport Amritsar">
  <option value="Bilaspur Helipad">
  <option value="Aviation Research Centre, RAW Headquarter Helipad">
  <option value="Daporijo Airport">
  <option value="Dhubulia Airstrip">
  <option value="Digri Airstrip">
  <option value="Sido Kanhu Airport">
  <option value="Kazi Nazrul Islam Airport">
  <option value="Durgapur Steel Plant Airport">
  <option value="Faizabad Airport">
  <option value="STC BSF Indian Army Helipad">
  <option value="PAP Complex Heliport">
  <option value="Kalyan airstrip">
  <option value="Kanchrapara Airfield">
  <option value="Catholic Medical Centre Helipad">
  <option value="Khandwa Airport">
  <option value="Kohima Helipad">
  <option value="Lebong Helipad">
  <option value="Maithon Heliport">
  <option value="Mathura Heliport">
  <option value="Kunjali Helipad">
  <option value="Minicoy Helipad">
  <option value="Shikra Naval Helibase">
  <option value="Butcher Island Helipad">
  <option value="Mahalaxmi Race Course Helipad">
  <option value="Raj Bhavan Helipad">
  <option value="HQ Eastern Air Command Helipad">
  <option value="Namchi Helipad">
  <option value="Osmanabad Airport">
  <option value="Pedong Helipad">
  <option value="Pelling Helipad">
  <option value="Phalodi Airfield">
  <option value="Poonch Airport">
  <option value="Charra Airfield">
  <option value="Basanth Nagar Airport">
  <option value="Basanth Nagar Airport">
  <option value="Surichua Air Base">
  <option value="Rasgovindpur Airstrip">
  <option value="Korba Airport">
  <option value="Saiha Helipad">
  <option value="SXV Salem , Tamil Nadu, India">
  <option value="Sevoke Road Indian Army Heliport">
  <option value="Serchhip Helipad">
  <option value="Shillong Indian Army Helipad">
  <option value="Shirpur Airport">
  <option value="Umaria Air Field">
  <option value="Upper Tadong Indian Army Helipad">
  <option value="Vanasthali Airport">
  <option value="Vijay Nagar Airport">
      </datalist>
  <script>
      $(document).ready(function () {

          $.notify({
              // options
              message: 'You have been <strong>successfully logged in</strong>.'
          },{
              // settings
              type: 'success',
              offset: 20,
              spacing: 10,
              z_index: 1031,
              delay: 2000,
              allow_dismiss: true,
              animate: {
                  enter: 'animated fadeInDown',
                  exit: 'animated fadeOutUp'
              }
          });

      });

      function showNotification(message, type) {

          $.notify({
              // options
              message: message
          },{
              // settings
              type: type,
              offset: 20,
              spacing: 10,
              z_index: 5000,
              delay: 2000,
              allow_dismiss: true,
              animate: {
                  enter: 'animated fadeInDown',
                  exit: 'animated fadeOutUp'
              }
          });


      }

      $('#datePicker').datepicker({
          zIndexOffset: 1000,
          orientation: 'bottom'
      });

 /*   function ticket(id,from,to,flightDate,bookingDate) {

    }*/

      function AppViewModel() {
          this.inputFrom = ko.observable("");
          this.inputTo = ko.observable("");
          this.date = ko.observable("");
          this.tickets = ko.observableArray([]);
          var self = this;

          this.bookTicket = function () {
            if (this.inputFrom().length !== 0 && this.inputTo().length !== 0 && this.date().length !== 0) {

                var request;

                var postForm = { //Fetch form data
                    'from'     : self.inputFrom(), //Store name fields value
                    'to': self.inputTo(),
                    'date': self.date()
                };
               request = $.ajax({
                   type: "POST",
                    url: 'booking/BookTicket.php',
                    data: postForm
                });


                request.done(function (response, textStatus, jqXHR){
                    // show successfully for submit message
//                    $("#result").html('Submitted successfully');
                    showNotification("Your ticket has been booked successfully .", "success");

                    $('#bookTicketModal').modal('hide');

                    self.tickets.unshift({
                        id: self.tickets().length + 1,
                        booking_date: "Just now",
                        flight_date: self.date(),
                        loc_from: self.inputFrom(),
                        loc_to: self.inputTo()
                        });
                });

                /* On failure of request this function will be called  */
                request.fail(function (){

                    // show error
                    showNotification("Sorry, Booking falied.", "danger");

                });

            } else {
                $.notify({
                    // options
                    message: 'Please fill up all the fields'
                },{
                    // settings
                    type: 'warning',
                    offset: 20,
                    spacing: 10,
                    z_index: 5000,
                    delay: 2000,
                    allow_dismiss: true,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });
            }
          };

          this.cancelTicket = function () {
            var selfTicket = this;
              $.confirm({
                  title: 'Are you sure?' ,
                  content: 'Do you really want to cancel the ticket?',
                  confirm: function(){
                      postData = { //Fetch form data
                          ticket_id: selfTicket.id
                      };

                      var request;

                      request = $.ajax({
                          type: "POST",
                          url: 'booking/cancelTicket.php',
                          data: postData
                      });


                      request.done(function (response, textStatus, jqXHR){

                          showNotification("Your ticket has been cancelled", "success");
                          self.tickets.remove(selfTicket);

                      });

                      /* On failure of request this function will be called  */
                      request.fail(function (){

                          // show error
                          showNotification("Your ticket can't be cancelled", "danger");

                      });
                  },
                  cancel: function(){
                  }
              });

          };

          this.loadBookings = function () {
            $.get(
                "booking/getTickets.php",
                function (data) {
                    self.tickets(data);
                }
            )
          };
      }

      // Activates knockout.js
      var viewModel = new AppViewModel();
      ko.applyBindings(viewModel);

      $(document).ready(function () {
          viewModel.loadBookings();
      });

  </script>
  </body>
</html>
