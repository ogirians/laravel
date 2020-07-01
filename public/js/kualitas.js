function kualitas(angka) {
        if (angka >= 90 && angka <= 100 ) {
            var str = "A" ;
            var clr = str.fontcolor("green");
            return clr
        }

        if (angka >= 70 && angka <= 89 ) {
            var str = "B" ;
            var clr = str.fontcolor("#0066ff");
            return clr
        }

        if (angka >= 50  && angka <= 69 ) {
            var str = "C" ;
            var clr = str.fontcolor("#ffcc00");
            return clr
        }

        if (angka >= 30  && angka <= 49 ) {
             var str = "D" ;
            var clr = str.fontcolor("#ff3300");
            return clr;
        }

        if (angka >= 1  && angka <= 29 ) {
            var str = "E" ;
            var clr = str.fontcolor("#660000");
            return clr;
        }


        if (angka <= 1 ) {
            return "Z-Z";
        }

    };