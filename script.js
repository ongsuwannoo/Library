function rent(lis){
    for (var i in lis) {
        console.log(i);
        var name = lis[i]['guest'];
        var time_in = lis[i]['booked_time'];
        var time_out = lis[i]['checkout'];
        var table = document.getElementById("table0");
        var count = table.tBodies[0].childElementCount;

        var nRow = table.tBodies[0].insertRow(count);
        var lis_1 = [count+1, name, time_in, time_out];
        for (j in lis_1) {
            nRow.insertCell(j).innerText = lis_1[j];
        }
    }
}