let start;

let layer1ID = 0;
let layer2ID = 0;


function generateCreate() {
    document.getElementById('id').innerHTML='';
    var f = document.createElement("form");
    if(start == 3) {
        var i = document.createElement("input");
        i.setAttribute('type',"text");
        i.setAttribute('name',"question");
        i.setAttribute('placeholder','question');

        var i2 = document.createElement("input");
        i2.setAttribute('type',"text");
        i2.setAttribute('name',"answer");
        i2.setAttribute('placeholder','answer');

        var i3 = document.createElement("input");
        i3.setAttribute('type',"text");
        i3.setAttribute('name',"question");
        i3.setAttribute('placeholder','question');

        var s = document.createElement("input");
        s.setAttribute('type',"button");
        s.setAttribute('value',"Submit");
        s.setAttribute('onclick','save3()');
        var s2 = document.createElement("input");
        s2.setAttribute('type',"button");
        s2.setAttribute('value',"NextSub");
        s2.setAttribute('onclick','save3Back2()');

        f.appendChild(i2);
        f.appendChild(i3);
    }else if(start == 2) {
        var i = document.createElement("input");
        i.setAttribute('type',"text");
        i.setAttribute('name',"sub2");
        i.setAttribute('placeholder','subname2');

        var s = document.createElement("input");
        s.setAttribute('type',"button");
        s.setAttribute('value',"Submit");
        s.setAttribute('onclick','save2()');
        var s2 = document.createElement("input");
        s2.setAttribute('type',"button");
        s2.setAttribute('value',"NextQuiz");
        s2.setAttribute('onclick','save2Back1()');
    }else {

        var i = document.createElement("input");
        i.setAttribute('type',"text");
        i.setAttribute('name',"quiz");
        i.setAttribute('placeholder','quizname');

        var i2 = document.createElement("input");
        i2.setAttribute('type',"text");
        i2.setAttribute('name',"subname");
        i2.setAttribute('placeholder','subname');

        var s = document.createElement("input");
        s.setAttribute('type',"button");
        s.setAttribute('value',"Submit");
        s.setAttribute('onclick','save1()');
        var s2 = document.createElement("input");
        s2.setAttribute('type',"button");
        s2.setAttribute('value',"Done");
        s2.setAttribute('onclick','done()');

        f.appendChild(i2);
    }
    f.appendChild(i);
    f.appendChild(s);
    f.appendChild(s2);
    $('#id').append(f);
}

function save1() {
    start = 2;
    generateCreate();
}
function done() {
    let done = $("<i></i>").text("Done!");
    $('#id').append(done);
}
function save2() {
    start = 3;
    generateCreate();
}
function save2Back1() {
    start = 1;
    generateCreate();
}
function save3() {
    generateCreate();
}
function save3Back2() {
    start = 2;
    generateCreate();
}





