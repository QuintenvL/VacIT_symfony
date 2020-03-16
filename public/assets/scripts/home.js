
    $.get("/vacIT/public/api/vacatures", function(data, status){
        let vacatures =  data;
        let slides = [];
        let titels = [];
        let bedrijven = [];
        for (i= 0; i<data.length; i++){
            let titel = data[i].titel;
            let plaats = data[i].plaats;
            let niveau = data[i].niveau.name;
            let bedrijf = data[i].bedrijf.naam;
            let soort = data[i].soort;
            let soortNaam = soort.naam;
            let soortIcon = soort.icon;
            slides.push({src: 'assets/icons/' + soortIcon, text: titel});
            titels.push({text: niveau + " " + titel});
            bedrijven.push({text: bedrijf + ", " + plaats});
        }
        $("#vacature-loop").vegas({
            delay: 10000,
            timer: false,
            slides: slides,
            transition: 'fade',
            transitionDuration: 1000,
            firstTransition: 'fade',
            walk: function(i, settings){
                $('#vacature-loop-titel').text(titels[i].text);
                $('#vacature-loop-bedrijf').text(bedrijven[i].text);
                i = null;
            }
        });
    });
