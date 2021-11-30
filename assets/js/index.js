const dataPath = "../employee/getAllEmployees";
//const controllerEmpl = "./library/employeeController.php";
function changePage({ item }) {
    window.location.replace(`employee.php?employeeId=${item.id}`)
    console.log(item);
}

$.ajax(dataPath).done(function (employeesData) {
    $("#jsGrid").jsGrid({
        data: JSON.parse(employeesData),
        width: "100%",
        height: "auto",
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
        pageSize: 10,
        pageButtonCount: 3,
        filtering: false,
        autoload: true,
        rowClick: changePage,

        onItemInserted: function(item) {
          console.log(item)
        },

        controller: {
            insertItem: function (item) {
              console.log(item);
                return $.ajax({
                    type: "POST",
                    url: '../employee/add',
                    data: JSON.stringify(item),
                    success: function () {
                        //document.location.reload(true);
                    }
                })
            },

            deleteItem: (item) => $.ajax({
                type: "POST",
                url: "../employee/delete",
                data: item,
                success: function () {
                    //document.location.reload(true);
                }
            }),

            updateItem: (item) => $.ajax({
                type: "POST",
                url: '../employee/update',
                data: JSON.stringify({ 'data': item }),
                success: function () {
                    //document.location.reload(true);

                }
            }),

        },
        fields: [{
            name: "id",
            type: "text",
            visible: false,
            css: 'bordersAndBackground'
        },
        {
            name: "firstName",
            title: "Name",
            type: "text",
            width: 100,
            validate: "required",
            css: 'bordersAndBackground',
            headercss: 'backgroundHeader'

        },
        {
            name: "email",
            title: "Email",
            type: "text",
            width: 150,
            validate: [
                "required",
                {
                    message: "Please put a valid email address",
                    validator: function (value, item) {
                        return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
                    },
                }
            ],
            css: 'bordersAndBackground',
            headercss: 'backgroundHeader'

        },

        {
            name: "age",
            title: "Age",
            type: "text",
            width: 50,
            css: 'backgroundRed',
            validate: {
                validator: function (value) {
                    if (value >= 18 && value < 80) {
                        return true;
                    }
                },
                message: function (value, item) {
                    return "The client age should be between 18 and 80. Entered age is \"" + value + "\" is out of specified range.";
                },
                param: [18, 80]
            },
            css: 'bordersAndBackground',
            headercss: 'backgroundHeader'

        },
        {
            name: 'streetAdress',
            title: 'Address',
            type: 'text',
            width: '100',
            headercss: 'backgroundHeader',
            validate: 'required',
            css: 'bordersAndBackground'
        },
        {
            name: 'city',
            title: 'City',
            type: 'text',
            width: '100',
            validate: 'required',
            headercss: 'backgroundHeader',
            css: 'bordersAndBackground'
        },
        {
            name: 'stateName',
            title: 'State',
            type: 'text',
            width: '50',
            headercss: 'backgroundHeader',
            validate: 'required',
            css: 'bordersAndBackground'
        },
        {
            name: 'postalCode',
            title: 'Postal Code',
            type: 'text',
            headercss: 'backgroundHeader',
            width: '100',
            validate: {
                validator: function (value) {
                    if (value.length < 10 && value > 0) {
                        return true;
                    }
                },
                message: "Please enter a valid postal code",
            },
            css: 'bordersAndBackground'
        },
        {
            name: 'phoneNumber',
            title: 'Phone Number',
            type: 'number',
            headercss: 'backgroundHeader',
            width: '100',
            css: 'bordersAndBackground',
        },
        {
            type: "control",
            editButton: true,
        },
        ],

    });
});