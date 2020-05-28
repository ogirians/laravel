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

           var knowledge2  = parseInt($("#knowledge2").val());
           var wqual2  = parseInt($("#wqual2").val()); 
           var teamwork2 = parseInt($("#teamwork2").val());
           var communicate2 = parseInt($("#communicate2").val());       
           var dicipline2 = parseInt($("#dicipline2").val());
           var initiative2 = parseInt($("#initiative2").val());
           var creativity2 = parseInt($("#creativity2").val());
           var honestly2 = parseInt($("#honestly2").val());
           var obedience2 = parseInt($("#obedience2").val());
           var loyalty2 = parseInt($("#loyalty2").val());

        var rata22 =(knowledge * 15/100) + (wqual * 5/100) + (teamwork * 15/100) + (communicate * 10/100) + 
        (dicipline * 10/100) + (initiative * 5/100) + (creativity * 10/100) + (honestly * 10/100) + 
        (obedience * 15/100) + (loyalty * 5/100);

        var rata22b =(knowledge2 * 15/100) + (wqual2 * 5/100) + (teamwork2 * 15/100) + (communicate2 * 10/100) + 
        (dicipline2 * 10/100) + (initiative2 * 5/100) + (creativity2 * 10/100) + (honestly2 * 10/100) + 
        (obedience2 * 15/100) + (loyalty2 * 5/100);
        
        
        var gtotal = (rata22 + rata22b)/2;

       
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

           var know2 = kualitas(knowledge2);   
           var qual2 = kualitas(wqual2);
           var team2 = kualitas(teamwork2);
           var commu2 = kualitas(communicate2);
           var dicip2 = kualitas(dicipline2);
           var init2 = kualitas(initiative2);
           var creativ2 = kualitas(creativity2);
           var hones2 = kualitas(honestly2);
           var obed2 = kualitas(obedience2);
           var loyal2 = kualitas(loyalty2);

        var tkuali = kualitas(gtotal);
         var trata = kualitas(rata22);
          var trata2 = kualitas(rata22b);


        document.getElementById("gtotal-rata").innerHTML = gtotal;
        document.getElementById("gtotal").innerHTML = rata22;
        document.getElementById("gtotal2").innerHTML = rata22b;


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

            document.getElementById("knowkuali2").innerHTML = know2;
           document.getElementById("qualkuali2").innerHTML = qual2;
            document.getElementById("teamkuali2").innerHTML = team2;
            document.getElementById("comukuali2").innerHTML = commu2;
            document.getElementById("dicipkuali2").innerHTML = dicip2;
            document.getElementById("initkuali2").innerHTML = init2;
            document.getElementById("creativkuali2").innerHTML = creativ2;
            document.getElementById("honeskuali2").innerHTML = hones2;
            document.getElementById("obedkuali2").innerHTML = obed2;
            document.getElementById("loyalkuali2").innerHTML = loyal2;

             document.getElementById("tkualitas").innerHTML = trata;
              document.getElementById("tkualitas2").innerHTML = trata2;

            document.getElementById("tkualitas-rata").innerHTML = tkuali;
        
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


      function showhead(){   
        var knowledge  = parseInt($("#knowledge").val());
        var wspeed  = parseInt($("#wspeed").val());  
        var wsoul  = parseInt($("#wsoul").val()); 
        var wqual  = parseInt($("#wqual").val()); 
        var wpress  = parseInt($("#wpress").val());
        var rata2 = (knowledge * 5/100 ) + ( wspeed * 5/100 ) + ( wsoul * 5/100) + ( wqual * 5/100 ) + ( wpress * 5/100 );

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

        var rata22 =(teamwork * 5/100) + (communicate * 5/100) + (responbility * 5/100) + (learning * 5/100) + 
        (dicipline * 5/100) + (initiative * 5/100) + (creativity * 5/100) + (honestly * 5/100) + (obedience * 5/100) + (loyalty * 5/100);
        
        var organate  = parseInt($("#organate").val());
        var coaching  = parseInt($("#coaching").val());  
        var controling  = parseInt($("#controling").val()); 
        var planing  = parseInt($("#planing").val()); 
        var delegate  = parseInt($("#delegate").val());

        var rata222 =(organate * 5/100) + (coaching * 5/100) + (controling * 5/100) + (planing * 5/100) +
        (delegate * 5/100) ;

        var gtotal = rata2 + rata22 + rata222;

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


        //bagian C

        var orga = kualitas(organate);
        var coa = kualitas(coaching);
        var cont = kualitas(controling);
        var plan = kualitas(planing);
        var dele = kualitas(delegate);
       

        document.getElementById("rata").innerHTML = rata2;
        document.getElementById("rata2").innerHTML = rata22;
         document.getElementById("rata222").innerHTML = rata222;
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

        document.getElementById("orgakuali").innerHTML = orga;
        document.getElementById("coakuali").innerHTML = coa;
        document.getElementById("contkuali").innerHTML = cont;
        document.getElementById("plankuali").innerHTML = plan;
        document.getElementById("delekuali").innerHTML = dele;
      }; 