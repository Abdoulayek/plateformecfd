/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Vue from 'vue'
new Vue({
    el: '#app',
    data: {
        client: "Entreprise",
        nbrpermis: 1,
        idlast_numpermis: 3,
        tab: [{
            id: 1,
            name: "permis_1",
            value: 1
        }, {
            id: 2,
            name: "permis_2",
            value: 2
        }, {
            id: 3,
            name: "permis_3",
            value: 3
        }]
    },
    methods: {
        choixClient(i) {
            this.client = i;
        },
        addinsert() {
            let nbradd = parseInt(document.getElementById("adinsert").value);
            this.nbrpermis = nbradd;
            for (let i = 0; i < nbradd; i++) {
                let idpermis = parseInt(this.idlast_numpermis + 1);
                let namepermis = "permis_" + parseInt(this.idnow);
                this.tab[this.idlast_numpermis] = { id: idpermis, name: idpermis, value: idpermis };
                this.idlast_numpermis += 1;
            }
        }
    }
})