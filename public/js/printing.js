function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write(` <div class="p-2 flex-fill bd-highlight" style="width: 26%;background-color: white">
    <div class="d-flex bd-highlight" style="margin-left: 8%">
        <div class="p-2 flex-grow-1 bd-highlight" style="margin-left:3%; width: 12%"> <img
                src="{{ URL('images/Department of Education.png') }}" height="80px"></div>

        <div class="p-2 bd-highlight" style="margin-top: 50px; width: 400px">
            <h6 style="margin-left: 26%">Republic of Philippines</h6>
            <h6 style="margin-left: 20%;font-size:13px;margin-top: -7px"><b> DEPARTMENT OF EDUCATION </b></h6>
            <h6 style="margin-left: 23%; margin-top: -8px">Region VII, Central Visayas</h6>
            <h6 style="margin-left: 22%; font-size:13px; margin-top: -7px"> <b> DIVISION OF CEBU PROVINCE </b>
            </h6>


            <div style="margin-top: 10px">
                <div style="float: left;" ><b> District: </b></div>
                <div class="cardDetails" style="margin-top: 20px ">
                    <span style="margin-left: 25%;"> II
                    </span>
                    <hr class="line">
                </div>
            </div>
            <div style="margin-top: -25px">
                <div style="float: left;" ><b> School: </b></div>
                <div class="cardDetails" style="margin-top: 20px ">
                    <span style="margin-left: 6%;"> Mantalongon National High School
                    </span>
                    <hr class="line">
                </div>
            </div>

            <h6 style="font-size:14px; margin-top: 25px; margin-left: 35%"> <b>REPORT CARD</b></h6>
            @foreach ($admits as $admit)
                <h6 style="margin-top: -10px;margin-left: 42%">Grade {{ $admit->gradeLevel }}</h6>
            @endforeach
        </div>

        <div class="p-2 bd-highlight" style="margin-right:11%; width: 12%"><img
                src="{{ URL('images/DepEd-Logo.png') }}" height="80px" style="float: right"></div>
    </div>

    {{-- Left side --}}



    <div class="d-flex bd-highlight p-2">
        <div class="p-2 flex-fill bd-highlight">
            @foreach ($admissions as $admission)
                <div style="float: left">LRN: </div>
                <div class="cardDetails">
                    <span style="margin-left: 20%;"> <b>{{ $admission->LRN }}</b>
                    </span>
                    <hr class="line">
                </div>

                <div style="margin-top: -9%;">
                    <div style="float: left; margin-top: 3px">Age: </div>
                    <div class="cardDetails">
                        <span style="margin-left: 30%;"> <b>{{ $admission->age }}</b>
                        </span>
                        <hr class="line">
                    </div>
                </div>
            @endforeach
            @foreach ($admits as $admit)
                <div style="margin-top: -9%;">
                    <div style="float: left; margin-top: 3px">Grade: </div>
                    <div class="cardDetails">
                        <span style="margin-left: 27%;"> <b>{{ $admit->gradeLevel }}</b>
                        </span>
                        <hr class="line" style="margin-left: 50px">
                    </div>
                </div>

                <div style="margin-top: -9%;">
                    <div style="float: left; margin-top: 3px">School Year: </div>
                    <div class="cardDetails">
                        <span style="margin-left: 3%;"> <b>{{ $admit->school_year }}</b>
                        </span>
                        <hr class="line" style="margin-left: 83px">
                    </div>
                </div>
            @endforeach
        </div>
        {{-- Right side --}}
        <div class="p-2 flex-fill bd-highlight">
            @foreach ($admissions as $admission)
                <div style="float: left">Name: </div>
                <div class="cardDetails" style="margin-left: 12px">
                    <span style="margin-left: 5%;"> <b>{{ $admission->firstname }} {{ $admission->middlename }}
                            {{ $admission->lastname }}</b>
                    </span>
                    <hr class="line">
                </div>

                <div style="margin-top: -9%;">
                    <div style="float: left; margin-top: 3px">Sex: </div>
                    <div class="cardDetails">
                        <span style="margin-left: 30%;"> <b>{{ $admission->gender }}</b>
                        </span>
                        <hr class="line">
                    </div>
                </div>
            @endforeach
            @foreach ($admits as $admit)
                <div style="margin-top: -9%;">
                    <div style="float: left; margin-top: 3px">Section: </div>
                    <div class="cardDetails">
                        <span style="margin-left: 18%;"> <b>{{$admit->section}}</b>
                        </span>
                        <hr class="line" style="margin-left: 60px">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container" style="margin-top: -25px; margin-left: 5px;">
        <p>Dear Parents:</p>
        <div class="container" style="margin-left: 13px; margin-top: -12px">
            <p>This report card shows the ability and progress of your child in the different learning areas as
                well as his/her core values. <br> This school welcomes you desire to know more about your
                child's progress.</p>
        </div>

        <div class="d-flex justify-content-end" style="margin-top: 30px">
            <div>
                <h6 style="margin-left: 20px;"> <b> MARICEL R. CARZANO </b></h6>
                <hr style="width: 200px;  margin-top: -9px">
                <h6 style="margin-top: -12px; margin-left: 70px">Teacher</h6>
            </div>
        </div>

        <div class="d-flex justify-content-start">
            <div>
                <h6 style="margin-left: 20px;"><b> ROBERTO R. ROSALES </b></h6>
                <hr style="width: 200px;  margin-top: -9px">
                <h6 style="margin-top: -12px; margin-left: 58px">Principal I</h6>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <h6> <b> CERTIFICATE OF TRANSFER </b></h6>
        </div>

        <div class="d-flex bd-highlight">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div>
                    <div style="float: left; margin-top: -15px">Admitted to Transfer: </div>
                    <div class="cardDetails">
                        <hr>
                    </div>
                </div>
            </div>

            <div class="p-2 bd-highlight" style="width: 30%">
                <div>
                    <div style="float: left; margin-top: 3px">Section: </div>
                    <div class="cardDetails">
                        <span style="margin-left: 30%;"> <b> </b>
                        </span>
                        <hr class="line" style="margin-left:50px">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex bd-highlight" style="margin-top:-40px">
            <div class="p-2 flex-fill bd-highlight">
                <div>
                    <div style="float: left; margin-top: -15px">Eligible to Admission to Grade: </div>
                    <div class="cardDetails">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <h6>Approved:</h6>

        <div class="d-flex bd-highlight">
            <div class="p-2 flex-fill bd-highlight">
                <div>
                    <h6 style="margin-left: 20px;"><b> ROBERTO R. ROSALES </b></h6>
                    <hr style="width: 200px;  margin-top: -9px">
                    <h6 style="margin-top: -12px; margin-left: 58px">Principal I</h6>
                </div>
            </div>
            <div class="p-2 flex-fill bd-highlight">
                <div>
                    <h6 style="margin-left: 20px;"><b> MARICEL R. CARZANO</b></h6>
                    <hr style="width: 200px;  margin-top: -9px">
                    <h6 style="margin-top: -12px; margin-left: 58px">Teacher</h6>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start" style="margin-top: 18px">
            <h6>Cancellation of Elligibility to Transfer</h6>
        </div>

        <div class="d-flex bd-highlight" style="width: 80%">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div>
                    <div style="float: left; margin-top: -15px">Admitted in: </div>
                    <div class="cardDetails">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex bd-highlight" style="margin-top: -20px; width: 50%">
            <div class="p-2 flex-grow-1 bd-highlight">
                <div>
                    <div style="float: left; margin-top: -15px">Date: </div>
                    <div class="cardDetails">
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end" style="margin-top: 19px">
            <div>
                <h6 style="margin-left: 20px;"><b> </b></h6>
                <hr style="width: 200px;  margin-top: -9px">
                <h6 style="margin-top: -12px; margin-left: 58px">Principal I</h6>
            </div>
        </div>
    </div>
</div>`);

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}


