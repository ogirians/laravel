 //fungsi untuk menampilkan kualitas

    //fungsi untuk mengecek hasil sebelum disimpan, untuk bagian STAFF

function showdriver(){   
           var knowledge  = parseInt($("#knowledge").val());
           var wqual  = parseInt($("#wqual").val()); 
           var teamwork = parseInt($("#teamwork").val());
           var communicate = parseInt($("#communicate").val());       
           var dicipline = parseInt($("#dicipline").val());
           var initiative = parseInt($("#initiative").val());
           var creativity = parseInt($("#creativity").val());
           var honestly = parseInt($("#honestly").val());
           var obedience = parseInt($("#obedience").val());
           var loyalty = parseInt($("#loyalty").val());

        var rata22 =(knowledge * 15/100) + (wqual * 5/100) + (teamwork * 15/100) + (communicate * 10/100) + 
        (dicipline * 10/100) + (initiative * 5/100) + (creativity * 10/100) + (honestly * 10/100) + 
        (obedience * 15/100) + (loyalty * 5/100);
        
        
        var gtotal = rata22;

       
           var know = kualitas(knowledge);   
           var qual = kualitas(wqual);
           var team = kualitas(teamwork);
           var commu = kualitas(communicate);
           var dicip = kualitas(dicipline);
           var init = kualitas(initiative);
           var creativ = kualitas(creativity);
           var hones = kualitas(honestly);
           var obed = kualitas(obedience);
           var loyal = kualitas(loyalty);

        var tkuali = kualitas(gtotal);


        document.getElementById("gtotal").innerHTML = gtotal;

           document.getElementById("knowkuali").innerHTML = know;
           document.getElementById("qualkuali").innerHTML = qual;
            document.getElementById("teamkuali").innerHTML = team;
            document.getElementById("comukuali").innerHTML = commu;
            document.getElementById("dicipkuali").innerHTML = dicip;
            document.getElementById("initkuali").innerHTML = init;
            document.getElementById("creativkuali").innerHTML = creativ;
            document.getElementById("honeskuali").innerHTML = hones;
            document.getElementById("obedkuali").innerHTML = obed;
            document.getElementById("loyalkuali").innerHTML = loyal;
            document.getElementById("tkualitas").innerHTML = tkuali;
        
      }; 



function showstaff(){   
        var knowledge  = parseInt($("#knowledge").val());
        var wspeed  = parseInt($("#wspeed").val());  
        var wsoul  = parseInt($("#wsoul").val()); 
        var wqual  = parseInt($("#wqual").val()); 
        var wpress  = parseInt($("#wpress").val());
        var rata2 = (knowledge * 15/100 ) + ( wspeed * 10/100 ) + ( wsoul * 10/100) + ( wqual * 10/100 ) + ( wpress * 5/100 );

        var teamwork = parseInt($("#teamwork").val());
        var communicate = parseInt($("#communicate").val());
        var responbility = parseInt($("#responbility").val());
        var learning = parseInt($("#learning").val());
        var dicipline = parseInt($("#dicipline").val());
        var initiative = parseInt($("#initiative").val());
        var creativity = parseInt($("#creativity").val());
        var honestly = parseInt($("#honestly").val());
        var obedience = parseInt($("#obedience").val());
        var loyalty = parseInt($("#loyalty").val());

        var rata22 =(teamwork * 5/100) + (communicate * 5/100) + (responbility * 5/100) + (learning * 5/100) + (dicipline * 5/100) + (initiative * 5/100) + (creativity * 5/100) + (honestly * 5/100) + (obedience * 5/100) + (loyalty * 5/100);
        
        
        var gtotal = rata2 + rata22;

        //bagian A
        var know = kualitas(knowledge);
        var speed = kualitas(wspeed);
        var soul = kualitas(wsoul);
        var qual = kualitas(wqual);
        var press = kualitas(wpress);


        //bagian B
        var team = kualitas(teamwork);
        var commu = kualitas(communicate);
        var resp = kualitas(responbility);
        var learn = kualitas(learning);
        var dicip = kualitas(dicipline);
        var init = kualitas(initiative);
        var creativ = kualitas(creativity);
        var hones = kualitas(honestly);
        var obed = kualitas(obedience);
        var loyal = kualitas(loyalty);
        var tkuali = kualitas(gtotal);



        document.getElementById("rata").innerHTML = rata2;
        document.getElementById("rata2").innerHTML = rata22;
        document.getElementById("gtotal").innerHTML = gtotal;

        document.getElementById("knowkuali").innerHTML = know;
        document.getElementById("speedkuali").innerHTML = speed;
        document.getElementById("soulkuali").innerHTML = soul;
        document.getElementById("qualkuali").innerHTML = qual;
        document.getElementById("presskuali").innerHTML = press;


         document.getElementById("teamkuali").innerHTML = team;
         document.getElementById("comukuali").innerHTML = commu;
         document.getElementById("respkuali").innerHTML = resp;
         document.getElementById("learnkuali").innerHTML = learn;
         document.getElementById("dicipkuali").innerHTML = dicip;
         document.getElementById("initkuali").innerHTML = init;
         document.getElementById("creativkuali").innerHTML = creativ;
         document.getElementById("honeskuali").innerHTML = hones;
         document.getElementById("obedkuali").innerHTML = obed;
         document.getElementById("loyalkuali").innerHTML = loyal;
         document.getElementById("tkualitas").innerHTML = tkuali;
      }; 