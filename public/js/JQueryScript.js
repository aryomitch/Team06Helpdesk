// JQuery code
var state = 0;

$(document).ready(function () {

    // Load google charts
    google.charts.load('current', { 'packages': ['corechart'] });

    // Draw the chart and set the chart values
    function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
            ['Problem Analysis', 'Number'],
            ['Solved', 5],
            ['Unsolved', 2]]);

        // Optional; add a title and set the width and height of the chart
        var options = { 'title': 'Problems Analysis', 'width': 550, 'height': 400 };

        // Display the chart inside the <div> element with id="sysdetails"
        var chart = new google.visualization.PieChart(document.getElementById('syspie'));
        chart.draw(data, options);
    }

    function drawBarChartC() {
        var data = google.visualization.arrayToDataTable([
            ["Problem Category", "Number", { role: "style" }],
            ["Word Processing", 1, "Red"],
            ["Logins", 1, "Orange"],
            ["Skype", 3, "Green"],
            ["Microsoft Excel", 3, "Blue"],
            ["Database Applications", 5, "Yellow"],
            ["Photo Editing Applications", 1, "Purple"],
            ["Powerpoint", 2, "Black"],
            ["Internet Browsers", 10, "Turqoise"],
            ["Email Applications", 4, "Grey"],
            ["Mouses", 2, "Brown"],
            ["Keyboards", 1, "Tan"],
            ["Screens", 1, "Indigo"],
            ["Printers", 3, "Pink"],
            ["Computer Repair", 3, "Lime"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Number of Issues This Week By Category",
            width: 600,
            height: 400,
            bar: { groupWidth: "95%" },
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("sysbar"));
        chart.draw(view, options);
    }

    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ["Problem Type", "Number", { role: "style" }],
            ["High", 1, "Red"],
            ["Medium", 1, "Orange"],
            ["Low", 3, "Green"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Problems Solved by Alice",
            width: 450,
            height: 300,
            bar: { groupWidth: "95%" },
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchartvalues"));
        chart.draw(view, options);
    }

    function drawBarChartB() {
        var data = google.visualization.arrayToDataTable([
            ["Problem Type", "Number", { role: "style" }],
            ["High", 0, "Red"],
            ["Medium", 5, "Orange"],
            ["Low", 2, "Green"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Problems Assigned to Specialists",
            width: 450,
            height: 300,
            bar: { groupWidth: "95%" },
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchartvalues"));
        chart.draw(view, options);
    }

    function drawSpecBarChart1() {
        var data = google.visualization.arrayToDataTable([
            ["Problem Priority", "Number", { role: "style" }],
            ["High", 1, "Red"],
            ["Medium", 1, "Orange"],
            ["Low", 3, "Green"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Problems Solved (Priority)",
            width: 450,
            height: 300,
            bar: { groupWidth: "95%" },
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("specbarchart"));
        chart.draw(view, options);
    }

    function drawSpecBarChart2() {
        var data = google.visualization.arrayToDataTable([
            ["Problem Category", "Number", { role: "style" }],
            ["Skype", 1, "Red"],
            ["Word Processing", 1, "Orange"],
            ["File Maker", 3, "Green"],
            ["Microsoft Excel", 3, "Green"],
            ["Email Applications", 3, "Green"],
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Problems Solved (Category)",
            width: 450,
            height: 300,
            bar: { groupWidth: "95%" },
            legend: { position: "none" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("specbarchart"));
        chart.draw(view, options);
    }

    $("#sysButton").click(function ()
    {
        if (state == 0)
        {
            $("#operatoranalysis").hide();
            $("#specialistanalysis").hide();
            $("#sysdetails").hide();
            drawPieChart();
            drawBarChartC();
            state = 1;
        }
        else
        {
            $("#operatoranalysis").show();
            $("#specialistanalysis").show();
            $("#sysdetails").show();
            $("#syspie").empty();
            $("#sysbar").empty();
            state = 0;
        }
    });
    $("#opButton").click(function () {
        if (state == 0) {
            $("#systemanalysis").hide();
            $("#specialistanalysis").hide();
            $("#opdetails").empty();
            $("#operatoractive").css("display", "block");
            drawBarChart();
            state = 2;
        }
        else {
            $("#systemanalysis").show();
            $("#specialistanalysis").show();
            $("#operatoractive").css("display", "none");
            $("#opdetails").html("<h4>- See Number of calls taken by each operator</h4> <h4>- View how well operators can deal with problems of different priorites</h4> <h4>- View which problems operators may need training for</h4>");
            state = 0;
        }
    });
    $("#specButton").click(function () {
        if (state == 0) {
            $("#operatoranalysis").hide();
            $("#systemanalysis").hide();
            $("#techdetails").hide();
            $("#specialistactive").css("display", "block");
            drawSpecBarChart1();
            state = 3;
        }
        else {
            $("#operatoranalysis").show();
            $("#systemanalysis").show();
            $("#specialistactive").css("display", "none");
            $("#techdetails").show();
            //$("#techdetails").html("<h4>- View number of problems assigned to specialists</h4><h4>- See how long specialists take to solve problems</h4><h4>- See what areas of expertise specialists have or need training in</h4>");
            state = 0;
        }
    });
    $('#opsolved').click(function () {
        drawBarChart();
    });
    $('#opassigned').click(function () {
        drawBarChartB();
    });

    $('#solvedpriority').click(function () {
        drawSpecBarChart1();
    });
    $('#solvedcategory').click(function () {
        drawSpecBarChart2();
    });

    $("#weeklyDatePicker").datetimepicker({
        format: 'MM-DD-YYYY'
    });

    //Get the value of Start and End of Week
    $('#weeklyDatePicker').on('dp.change', function (e) {
        value = $("#weeklyDatePicker").val();
        firstDate = moment(value, "MM-DD-YYYY").day(0).format("MM-DD-YYYY");
        lastDate = moment(value, "MM-DD-YYYY").day(6).format("MM-DD-YYYY");
        $("#weeklyDatePicker").val(firstDate + "   -   " + lastDate);
    });

    $("#weeklyDatePicker2").datetimepicker({
        format: 'MM-DD-YYYY'
    });

    //Get the value of Start and End of Week
    $('#weeklyDatePicker2').on('dp.change', function (e) {
        value = $("#weeklyDatePicker").val();
        firstDate = moment(value, "MM-DD-YYYY").day(0).format("MM-DD-YYYY");
        lastDate = moment(value, "MM-DD-YYYY").day(6).format("MM-DD-YYYY");
        $("#weeklyDatePicker2").val(firstDate + "   -   " + lastDate);
    });
});
