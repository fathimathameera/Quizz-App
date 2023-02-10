@extends("layouts.master")
@section("content")
    <div class="container mt-5">
        <div class="card-body">

            <!-- Home Page -->
            @include('partials.menu')
            <div class="start_page" id="start_page">
                <div>
                    <h3>Welcome {{ $user->name }}</h3>
                </div>
                <div class="d-flex justify-content-center flex-column">
                    <button class="btn btn-primary d-fles mx-auto mt-4" id="start">Start New Quiz</button>
                    <div>
                        <form action="{{ route('scores.list') }}" method="post">
                            @csrf
                            <button class="btn btn-primary d-fles mx-auto mt-4" id="btn">My Score History</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Quiz Page -->
            <div id="main" class="mt-5">
                <div class="text-right float-right" id="count">
                    <h5><span id="question_count"></span> of 5</h5>
                </div>
                <div class="d-flex flex-row align-items-center">
                    <h3 class="text-danger" id="q">Q.</h3>
                    <h5 class="card-text font-weight-bold" id="question"></h5>
                </div>
                <div class="col-md-12 p-4" id="choices">
                    <button class="btn btn-block btn-outline-primary text-left choice" id="choice1"></button>
                    <button class="btn btn-block btn-outline-primary text-left choice" id="choice2"></button>
                    <button class="btn btn-block btn-outline-primary text-left choice" id="choice3"></button>
                    <button class="btn btn-block btn-outline-primary text-left choice" id="choice4"></button>
                    <div class="footer p-4">
                        <button class="btn btn-primary float-left" id="prev">< Previous</button>
                        <button class="btn btn-primary float-right" id="next">Next ></button>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <form action="{{ route('scores.save') }}" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="score" id="score">
                        <button class="btn btn-primary btn-lg mx-auto" name="finish" id="finish">Finish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        
    <script>

        // Variables
        var count = 0;
        var score = 0;
        var answer = [];

        var quiz = @json($questions);
        var correctAnswers = @json($correct_answers);

        //Main Ready function
        $(document).ready(function(){
            $('#finish').hide();
            $('#q').hide();
            $('#count').hide();
            $('#home').hide();

            buttons_manager();

            //Create Function
            function buttons_manager(){
                if(count >0){
                    $('#prev').show();
                    if(count ==4){
                        $('#next').hide();
                        $('#finish').show();
                    } else{
                        $('#next').show();
                    }
                } else{
                    $('#prev').hide();
                }
            }

            //Create Question Function
            function adding_Questions(data, i){
                $('#question').text(data[i].question)
                $('#choice1').text(data[i].choice1)
                $('#choice2').text(data[i].choice2)
                $('#choice3').text(data[i].choice3)
                $('#choice4').text(data[i].choice4)
                $('#question_count').text(Number(i+1));
            }

            // Answer Selection Function
            function selected_Answer(){
                for(var i=0 ; i<4 ; i++){
                    var a = document.getElementById("choices").children;
                    if(a[i].innerHTML == answer[count]){
                        $("#choices").children("button")[i].classList.add("active");
                    } else{
                        $("#choices").children("button")[i].classList.remove("active");
                    }
                }
            }

            function creating_result(){
                for(var i=0 ; i<answer.length ; i++){
                    if($.inArray(answer[i], correctAnswers) !== -1){
                        score++;
                    }
                }

                $("#main").hide();
                $("#score").val(score);
            }

            $("#choices").hide();

            //Attach API
            $('#start').click(function() {
                $('#q').show(); 
                $('#choices').show();
                $('#count').show();
                $('#home').show();
                adding_Questions(quiz,count);
                $('#start_page').hide();
                $('#prev').hide();
            })

            //Select Option
            $(".choice").click(function(){
                $(this).addClass("active");
                $(this).siblings().removeClass("active");
                answer[count] = $(this).html();
            });

            //Next Questions
            $("#next").click(function(){
                if(count > answer.length -1){
                    alert("Select Atleast 1 Option")
                } else{
                    count++;
                    adding_Questions(quiz, count);
                    $("#prev").show();
                    $(".choice").removeClass("active");
                    buttons_manager();
                    selected_Answer();
                }
            });

            // Previous Questions
            $("#prev").click(function(){
                count--;
                adding_Questions(quiz, count);
                buttons_manager();
                selected_Answer();
            });

            // Finish Quiz
            $("#finish").click(function(){
                if(count > answer.length -1){
                    alert("Select Atleast 1 Option");
                } else{
                    creating_result();
                }
            });

        })

    </script>
@endsection