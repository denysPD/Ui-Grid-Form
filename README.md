KozakGroup_UiGridForm is the module with example of: 
1. Creating Flat Table in database
2. Creating Ui Grid in Adminhtml
3. Creating Ui Form in Adminhtml with different kinds of fields (input, select and dynamicRows table).

Backend
---
- **Business Model** = app/code/KozakGroup/UiGridForm/Model/Record.php
- **Resource Model** = app/code/KozakGroup/UiGridForm/Model/ResourceModel/Record.php
- **Collection Model** = app/code/KozakGroup/UiGridForm/Model/ResourceModel/Record/Collection.php
- **Repository Model** = app/code/KozakGroup/UiGridForm/Model/RecordRepository.php
- **Search Results Model** = app/code/KozakGroup/UiGridForm/Model/RecordSearchResults.php
- **Data Provider for Ui Grid** = app/code/KozakGroup/UiGridForm/Model/Record/DataProvider.php
- **Controllers for Save, Delete, Edit, New, List actions** = app/code/KozakGroup/UiGridForm/Controller/Adminhtml/Record/
- **Interfaces for Repository, Business Model and Search Results** = app/code/KozakGroup/UiGridForm/Api/
- **Flat Table for Ui Grid** = app/code/KozakGroup/UiGridForm/etc/db_schema.xml
- **Translations** = app/code/KozakGroup/UiGridForm/i18n/en_US.csv

Frontend
---
- **Ui Form buttons (Back, Delete, Save)** = app/code/KozakGroup/UiGridForm/Block/Adminhtml/Record/Edit/
- **Select Field Input in Form options** = app/code/KozakGroup/UiGridForm/Config/Source/SelectFieldType.php
- **Ui Grid in Adminhtml**:
1. app/code/KozakGroup/UiGridForm/view/adminhtml/layout/kozakgroup_uigridform_record_list.xml
2. app/code/KozakGroup/UiGridForm/view/adminhtml/ui_component/kozakgroup_uigridform_grid_listing.xml
- **Ui Form in Adminhtml**:
1. app/code/KozakGroup/UiGridForm/view/adminhtml/layout/kozakgroup_uigridform_record_edit.xml
2. app/code/KozakGroup/UiGridForm/view/adminhtml/ui_component/kozakgroup_uigridform_grid_form.xml


How to
---
1. Create dynamicRows table in Ui Form:
- **Initialize dynamicRows table**
Line 129 - 197: app/code/KozakGroup/UiGridForm/view/adminhtml/ui_component/kozakgroup_uigridform_grid_form.xml
- **To be able to save the data from dynamicRows table.**
Line 12 - 15: app/code/KozakGroup/UiGridForm/view/adminhtml/layout/kozakgroup_uigridform_record_edit.xml
Full file: app/code/KozakGroup/UiGridForm/view/adminhtml/templates/js.phtml
Full file: app/code/KozakGroup/UiGridForm/view/adminhtml/web/js/table-params.js
Full file: app/code/KozakGroup/UiGridForm/Controller/Adminhtml/Record/Save.php
- **To be able to load data into dynamicRows when you open the form for editing some record**
Line 28: app/code/KozakGroup/UiGridForm/view/adminhtml/ui_component/kozakgroup_uigridform_grid_form.xml
Full file: app/code/KozakGroup/UiGridForm/Model/Record/DataProvider.php