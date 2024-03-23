const fs = require('fs');
const pdf = require('html-pdf');
console.log("in progress")
document.getElementById('downloadBtn').addEventListener('click', function () {
    const container = document.querySelector('.container').innerHTML;

    pdf.create(container).toFile('admission_confirmation.pdf', function(err, res) {
        if (err) return console.log(err);
        console.log(res);
        alert('PDF has been generated and downloaded successfully!');
    });
});
