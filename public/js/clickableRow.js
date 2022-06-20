//for clicking the table;
$("tbody").on("click", "tr", function (e) {
    $(this)
        .toggleClass("selected")
        .siblings(".selected")
        .removeClass("selected");
});



//Irregular and balik aral toggle
$("#irregular").on("click", function(){
    $("#irregular_learners").slideToggle('slow');             // .fadeToggle() // .slideToggle()
  });

  $("#balik-students").on("click", function(){
    $("#balik-aral_learners ").slideToggle('slow');             // .fadeToggle() // .slideToggle()
  });


//Check on Gender checkbox
$('input.gender').on('change', function() {
    $('input.gender').not(this).prop('checked', false);
});

//Check indigenous choices
$('input.indigenous').on('change', function() {
    $('input.indigenous').not(this).prop('checked', false);
});











//enabling irregular checked box from grade 7 - 10;
$("#selected").on("click", function () {
    $("#irregular").attr("disabled", false);
});
$("#selected").on("change", function () {
    var level = $("#selected").val();
    if (level == "1") {
        $(".grade7").attr("hidden", false);
        $(".grade8").attr("hidden", true);
        $(".grade9").attr("hidden", true);
        $(".grade10").attr("hidden", true);
    } else if (level == "2") {
        $(".grade7").attr("hidden", true);
        $(".grade8").attr("hidden", false);
        $(".grade9").attr("hidden", true);
        $(".grade10").attr("hidden", true);
    } else if (level == "3") {
        $(".grade7").attr("hidden", true);
        $(".grade8").attr("hidden", true);
        $(".grade9").attr("hidden", false);
        $(".grade10").attr("hidden", true);
    } else if (level == "4") {
        $(".grade7").attr("hidden", true);
        $(".grade8").attr("hidden", true);
        $(".grade9").attr("hidden", true);
        $(".grade10").attr("hidden", false);
    }
});

//enabling irregular checked box from 11-12;
$("#select").on("click", function () {
    $("#irregular").attr("disabled", false);
});

$("#select").on("change", function () {
    var level = $("#select").val();
    if (level == "5") {
        $(".grade11").attr("hidden", false);
        $(".grade12").attr("hidden", true);
    } else if (level == "6") {
        $(".grade11").attr("hidden", true);
        $(".grade12").attr("hidden", false);
    }
});

//Irregular
$("#irregular").on("click", function () {
    var irregular = document.getElementById("irregular");
    var balik_aral = document.getElementById("balik-students");
    if (
        irregular.checked == true &&
        balik_aral.checked == false
    ) {
        $("#irregular_learners").attr("hidden", false);
        $("#balik-aral_learners").attr("hidden", true);
        $("#juniorHigh").attr("hidden", false);
        // console.log('irregular');
        document.getElementById("irregular").value = "irregular";

    } else if (
        irregular.checked == true &&
        balik_aral.checked == true
    ) {
        $("#irregular_learners").attr("hidden", false);
        $("#balik-aral_learners").attr("hidden", false);
        $("#juniorHigh").attr("hidden", true);
        // console.log('irregular');
        document.getElementById("irregular").value = "irregular";

    } else if (
        irregular.checked == false &&
        balik_aral.checked == true
    ) {
        $("#irregular_learners").attr("hidden", true);
        $("#balik-aral_learners").attr("hidden", false);
        $("#juniorHigh").attr("hidden", false);
        // console.log('irregular');
        document.getElementById("irregular").value = "regular";

    } else if (
        irregular.checked == false &&
        balik_aral.checked == false
    ) {
        $("#irregular_learners").attr("hidden", true);
        $("#balik-aral_learners").attr("hidden", true);
        $("#juniorHigh").attr("hidden", false);
        // console.log('irregular');
        document.getElementById("irregular").value = "regular";
    }
});

//Balik-aral
$("#balik-students").on("click", function () {
    var senior = document.getElementById("seniorHigh-students");
    var irregular = document.getElementById("irregular");
    var balik_aral = document.getElementById("balik-students");
    if (
        balik_aral.checked == true &&
        irregular.checked == false &&
        senior.checked == false
    ) {
        $("#balik-aral_learners").attr("hidden", false);
        $("#irregular_learners").attr("hidden", true);
        $("#seniorHigh_admission").attr("hidden", true);
        $("#juniorHigh").attr("hidden", false);
    } else if (
        senior.checked == true &&
        irregular.checked == true &&
        balik_aral.checked == false
    ) {
        $("#balik-aral_learners").attr("hidden", true);
        $("#irregular_learners").attr("hidden", false);
        $("#seniorHigh_admission").attr("hidden", false);
        $("#juniorHigh").attr("hidden", true);
    } else if (
        balik_aral.checked == true &&
        irregular.checked == true &&
        senior.checked == true
    ) {
        $("#juniorHigh").attr("hidden", true);
        $("#irregular_learners").attr("hidden", false);
        $("#seniorHigh_admission").attr("hidden", false);
        $("#balik-aral_learners").attr("hidden", false);
    } else if (
        balik_aral.checked == false &&
        irregular.checked == true &&
        senior.checked == false
    ) {
        $("#juniorHigh").attr("hidden", false);
        $("#irregular_learners").attr("hidden", false);
        $("#seniorHigh_admission").attr("hidden", true);
        $("#balik-aral_learners").attr("hidden", true);
    } else if (
        balik_aral.checked == false &&
        irregular.checked == false &&
        senior.checked == true
    ) {
        $("#juniorHigh").attr("hidden", true);
        $("#irregular_learners").attr("hidden", true);
        $("#seniorHigh_admission").attr("hidden", false);
        $("#balik-aral_learners").attr("hidden", true);
    } else if (
        balik_aral.checked == false &&
        irregular.checked == false &&
        senior.checked == false
    ) {
        $("#juniorHigh").attr("hidden", false);
        $("#irregular_learners").attr("hidden", true);
        $("#seniorHigh_admission").attr("hidden", true);
        $("#balik-aral_learners").attr("hidden", true);
    } else if (
        balik_aral.checked == true &&
        irregular.checked == true &&
        senior.checked == false
    ) {
        $("#juniorHigh").attr("hidden", false);
        $("#irregular_learners").attr("hidden", false);
        $("#seniorHigh_admission").attr("hidden", true);
        $("#balik-aral_learners").attr("hidden", false);
    }
});

function seniorHigh() {
    // var sem = document.getElementById("semester");
    // var track = document.getElementById("track");
    // var strand = document.getElementById("strand");
    // var senior = document.getElementById("seniorHigh-students");
    // if (senior.checked == false) {
    //         sem.val = "";
    //         track.val = "";
    //         strand.val = "";
    //     }
    console.log('hello');
}

