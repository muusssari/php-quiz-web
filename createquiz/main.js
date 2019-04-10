let start;

let layer1ID = 0;
let layer2ID = 0;

generateCreate();
function generateCreate() {
    document.getElementById('id').innerHTML='';
    var f = document.createElement("form");
    if(start == 3) {
        var i = document.createElement("input");
        i.setAttribute('type',"text");
        i.setAttribute('id',"question");
        i.setAttribute('placeholder','question');
        i.setAttribute('class', 'form-control');


        var i2 = document.createElement("input");
        i2.setAttribute('type',"text");
        i2.setAttribute('id',"rightAns");
        i2.setAttribute('placeholder','rightAns');
        i2.setAttribute('class', 'form-control');

        var i3 = document.createElement("input");
        i3.setAttribute('type',"text");
        i3.setAttribute('id',"rightAnsQ");
        i3.setAttribute('placeholder','rightAnsQ');
        i3.setAttribute('class', 'form-control');


        var i4 = document.createElement("input");
        i4.setAttribute('type',"text");
        i4.setAttribute('id',"qType");
        i4.setAttribute('placeholder','TRUE OR FALSE');
        i4.setAttribute('class', 'form-control');


        var s = document.createElement("input");
        s.setAttribute('type',"button");
        s.setAttribute('value',"Submit");
        s.setAttribute('onclick','save3()');
        s.setAttribute('class', 'btn btn-success create_btn');


        var s2 = document.createElement("input");
        s2.setAttribute('type',"button");
        s2.setAttribute('value',"NextSub");
        s2.setAttribute('onclick','save3Back2()');
        s2.setAttribute('class', 'btn btn-outline-light create_btn');


        f.appendChild(i2);
        f.appendChild(i3);
        f.appendChild(i4);
    }else if(start == 2) {
        var i = document.createElement("input");
        i.setAttribute('type',"text");
        i.setAttribute('id',"sub2");
        i.setAttribute('placeholder','subname2');
        i.setAttribute('class', 'form-control');


        var s = document.createElement("input");
        s.setAttribute('type',"button");
        s.setAttribute('value',"Submit");
        s.setAttribute('onclick','save2()');
        s.setAttribute('class', 'btn btn-success create_btn');

        var s2 = document.createElement("input");
        s2.setAttribute('type',"button");
        s2.setAttribute('value',"NextQuiz");
        s2.setAttribute('onclick','save2Back1()');
        s2.setAttribute('class', 'btn btn-outline-light create_btn');

    }else {

        var i = document.createElement("input");
        i.setAttribute('type',"text");
        i.setAttribute('id',"quiz");
        i.setAttribute('placeholder','quizname');
        i.setAttribute('class', 'form-control');


        var i2 = document.createElement("input");
        i2.setAttribute('type',"text");
        i2.setAttribute('id',"subname");
        i2.setAttribute('placeholder','subname');
        i2.setAttribute('class', 'form-control');


        var s = document.createElement("input");
        s.setAttribute('type',"button");
        s.setAttribute('value',"Submit");
        s.setAttribute('onclick','save1()');
        s.setAttribute('class', 'btn btn-success create_btn');

        var s2 = document.createElement("input");
        s2.setAttribute('type',"button");
        s2.setAttribute('value',"Done");
        s2.setAttribute('onclick','done()');
        s2.setAttribute('class', 'btn btn-outline-light create_btn');


        f.appendChild(i2);
    }
    f.appendChild(i);
    f.appendChild(s);
    f.appendChild(s2);
    $('#id').append(f);
}

function save1() {
    let quiz = document.getElementById("quiz").value;
    let subname = document.getElementById("subname").value;
    $.ajax({  
        type: 'POST',  
        url: 'saveCreatedQuiz.php', 
        data: { quiz: quiz, subname: subname },
        success: function(response) {
            console.log(response);
        }
    });
    start = 2;
    generateCreate();
}
function done() {
    let done = $("<i class='doneStyle'></i>").text("Done!");
    $('#id').append(done);
}

function save2() {
    let sub2 = document.getElementById("sub2").value;
    $.ajax({  
        type: 'POST',  
        url: 'saveCreatedQuiz.php', 
        data: { sub2: sub2},
        success: function(response) {
            console.log(response);
        }
    });
    start = 3;
    generateCreate();
}
function save2Back1() {
    start = 1;
    generateCreate();
}
function save3() {
    let question = document.getElementById("question").value;
    let rightAns = document.getElementById("rightAns").value;
    let rightAnsQ = document.getElementById("rightAnsQ").value;
    let qType = document.getElementById("qType").value;
    $.ajax({  
        type: 'POST',  
        url: 'saveCreatedQuiz.php', 
        data: { question: question, rightAns: rightAns, rightAnsQ: rightAnsQ, qType: qType,},
        success: function(response) {
            console.log(response);
        }
    });
    generateCreate();
}
function save3Back2() {
    start = 2;
    generateCreate();
}