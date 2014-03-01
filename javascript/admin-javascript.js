/*global window, document*/
(function () {
    "use strict";
    window.addEventListener('load', function () {
        var defaultPageSelect, selectedPageID;

        defaultPageSelect = document.getElementById('default-page-id');
        selectedPageID = defaultPageSelect.options[defaultPageSelect.selectedIndex].value;

        function ipw_update_exclude_pages_list() {
            var labelElement;

            if (selectedPageID) {
                labelElement = document.getElementById('checkbox' + selectedPageID);
                labelElement.style.display = 'block';
                labelElement.getElementsByTagName('input')[0].checked = false;
            }

            selectedPageID = defaultPageSelect.options[defaultPageSelect.selectedIndex].value;
            labelElement = document.getElementById('checkbox' + selectedPageID);
            labelElement.style.display = 'none';
            labelElement.getElementsByTagName('input')[0].checked = false;
        }

        ipw_update_exclude_pages_list();
        defaultPageSelect.addEventListener('change', ipw_update_exclude_pages_list);
    });
}());