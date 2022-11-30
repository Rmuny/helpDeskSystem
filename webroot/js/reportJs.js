let save_button = document.getElementById('save_table');

/*
  Get data from table
  @return array
*/

let get_data_from_table = function() {

    let data = Array();
    let tr;
    let td;

    tr = document.getElementById("report_table").getElementsByTagName("tr");
    for (let i = 0; i < tr.length; i++) {
        td = tr.item(i).getElementsByTagName("td");
        data[i] = Array();
        for (let j = 0; j < td.length; j++) {
            data[i][j] = td.item(j).innerText;
        }
    }

    return data;
}

/*
@get array
@return row string for csv
*/
let prepare_csv_data = function(row) {
    let finalVal = '';
    for (let j = 0; j < row.length; j++) {
        let innerValue = row[j] === null ? '' : row[j].toString();
        if (row[j] instanceof Date) {
            innerValue = row[j].toLocaleString();
        };
        var result = innerValue.replace(/"/g, '""');
        if (result.search(/("|,|\n)/g) >= 0)
            result = '"' + result + '"';
        if (j > 0)
            finalVal += ',';
        finalVal += result;
    }
    return finalVal + '\n';
};

save_button.onclick = function() {

    let data = get_data_from_table();

// CSV standard string
    let csvFile = '';
    for (let i = 0; i < data.length; i++) {
        csvFile += prepare_csv_data(data[i]);
    }

// prepare file
    var file = new Blob([csvFile], { type: 'text/csv;charset=utf-8;' });
    if (window.navigator.msSaveOrOpenBlob) // IE10+
        window.navigator.msSaveOrOpenBlob(file, "report.csv");
    else { // Others
        var a = document.createElement("a"),
            url = URL.createObjectURL(file);
        a.href = url;
        a.download = "report.csv";
        document.body.appendChild(a);
        a.style.visibility = 'hidden';
        a.click();
        setTimeout(function() {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);
        }, 0);
    }

}
