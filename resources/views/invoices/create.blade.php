<x-layout>
    <style>
        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 1000;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 20%;
        }

        /* Style the items */
        .ui-menu-item {
            list-style-type: none;
            padding: 5px 10px;
        }

        /* Style the highlighted item */
        .ui-menu-item.ui-state-focus {
            background-color: #eee;
        }
    </style>
<form action="{{ route('invoices.store') }}" method="POST"
        class="space-y-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
        style="margin-right: 9.375rem; margin-left: 9.375rem; margin-top:7rem; margin-bottom:2rem;">
        @csrf
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white" style="margin-bottom: 3rem">
            Ajouter une Facture
        </h1>
        <div class="flex justify-content-between space-x-4 ">
            <div class="flex items-center">
                <input id="default-radio-1" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saisie manuelle</label>
            </div>
            <div class="flex items-center">
                <input checked id="default-radio-2" type="radio" value="" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Saisie automatique</label>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6 ">
        <div>
            <label class="block mb-2 font-medium text-gray-900 dark:text-white" for="user_avatar">Importer la
                Facture</label>
            <input
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help" id="user_avatar" type="file">
        </div>
        <div>
            <div>
                <label for="Type" class="block mb-2 font-medium text-gray-900 dark:text-white">Etat de paiement</label>
                <select id="Type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Aucun</option>
                    <option>Payé</option>
                    <option>Partiellement Payé</option>
                    <option>Non Payé</option>
                </select>
            </div>
        </div>
    </div>

        <div class="grid md:grid-cols-2 md:gap-6 ">
            <div class="relative z-0 w-full mb-5 group" style="margin-bottom: 0px;">
                <input type="text" name="reference" id="reference"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="reference"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Réference
                </label><!-- HERE IS THE INVOICE ID reference -->
            </div>

            <div class="relative z-0 w-full mb-5 group" style="margin-bottom: 0px;">
                <input type="text" id="serial_number" name="serial_number" autocomplete="off"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" "  />
                <label for="serial_number"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">N.compteur
                </label><!-- HERE IS THE COUNTER ID counter_id -->
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label class="block mb-2 font-medium text-gray-900 dark:text-white" for="issue_date">Date de
                    facturation</label>
                <input id="issue_date" name="issue_date" type="date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-900 dark:text-white" for="due_date">Date
                    d'échéance</label>
                <input id="due_date" name="due_date" type="date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-900 dark:text-white" for="pleasePayBefore">Prière de
                    payer avant le</label>
                <input id="pleasePayBefore" name="pleasePayBefore" type="date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>

            <div>
                <label class="block mb-2 font-medium text-gray-900 dark:text-white" for="nextIndexReading">Prochain
                    relevé d'index</label>
                <input id="nextIndexReading" name="nextIndexReading" type="date"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="amount" id="amount"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="amount"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Montant
                à payer</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="consumption" id="consumption"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="consumption"
                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantité consommée</label>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Valider
            la saisie</button>
            <button type="submit"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#serial_number').change(function() {
                var serialNumber = $(this).val();
                $.get('/get-counter-type/' + serialNumber, function(data) {
                    var typeMapping = {
                        'none': 'Aucun',
                        'electricity': 'Eléctricité',
                        'gas': 'Gaz',
                        'water': 'Eau'
                    };
                    $('#Type').val(typeMapping[data.type]);
    
                    // Fetch and set the address associated with the serial number
                    $.get('/get-local-address/' + serialNumber, function(addressData) {
                        $('#address').val(addressData);
                    });
                });
            });
    
            $('#serial_number').autocomplete({
                source: function(request, response) {
                    $.get('/get-counter-serial_number/' + request.term, function(data) {
                        response(data);
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $('#serial_number').val(ui.item.value);
                }
            });
        });
    </script>
</x-layout>
