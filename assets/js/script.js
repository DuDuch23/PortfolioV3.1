$(document).ready(function() {
    $('body').animate({opacity: '1'}, 1000);
    $('#content_fiche_projet').css({opacity: '0'});
    $('.btn_fiche_projet').click(function() {
        $('body').css('overflow-y', 'hidden');

        const projetId = $(this).data('projetId');
        $.ajax({
            url: `/projet/${projetId}/fiche_projet`,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#content_fiche_projet').html(`
                <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    ${data.nom}
                                </h3>
                                <button type="button" class="close_fiche_projet text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <img class="image_projet" src="{{ vich_uploader_asset(projet, 'imageFileProjetApercu') }}" alt="${data.alt}">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    ${data.description}
                                </p>
                                <p>
                                    ${data.tempsRealisation}
                                </p>
                                <p>
                                    ${data.technoId.nom}
                                </p>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <a href="${data.lien}" target="_blank" data-modal-hide="static-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Visiter</a>
                                <a href="${data.lienGithub}" target="_blank" data-modal-hide="static-modal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><img src="../public/images/projets/github.png"></a>
                            </div>
                        </div>
                    </div>
                </div>
                `);
                console.log(data);
            },
            error: function(error) {
                console.error('Une erreur s\'est produite : ', error);
            }
        });
        $('#content_fiche_projet').animate({opacity: '1'}, 500);
    });

    $(document).on('click', '.close_fiche_projet', function() {
        $('#content_fiche_projet').animate({opacity: '0'}, 1000);
        // $('#static-modal').remove();
        $('body').css('overflow-y', 'auto');
    });
});

