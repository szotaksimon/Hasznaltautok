function chechForm(form){
    let marka = document.getElementById("marka").value
    let modell = document.getElementById("modell").value
    let kivitel = document.getElementById("kivitel").value
    let evjarat = document.getElementById("evjarat").value
    let ar = document.getElementById("ar").value
    let uzemanyag = document.getElementById("uzemanyag").value
    let allapot = document.getElementById("allapot").value
    let leiras = document.getElementById("leiras").value

    if(form.marka == "" || form.modell == "" || form.kivitel == "" || form.evjarat == ""){
        alert("Minden bevitelimezőt ki kell tölteni!")
        return false
    }
    else if(form.marka == "" || form.modell == "" || form.kivitel == "" || form.evjarat == ""){
        alert("Minden bevitelimezőt ki kell tölteni!")
        return false
    }
    else if(form.leiras.length > 450){
        alert("Túl hosszú 'leírás'!")
        return false
    }

    var re = /^[\w ]+$/;

    if(!re.test(form.marka == "" || form.modell == "" || form.kivitel == "" || form.evjarat == "" || form.marka == "" || form.modell == "" || form.kivitel == "" || form.evjarat == "")){
        alert("Nem használhat speciális karaktereket!")
        return false
    }

    return true

}