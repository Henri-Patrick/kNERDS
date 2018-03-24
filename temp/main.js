'use strict';

// replace with your access_token
var token = 'eyJhbGciOiJSUzI1NiIsImtpZCI6IkVBOUE2OTYzRjIyNUZFQjcwRDZGN0U2ODdCOTUzNTE3M0RDNjA0QTgiLCJ0eXAiOiJKV1QiLCJ4NXQiOiI2cHBwWV9JbF9yY05iMzVvZTVVMUZ6M0dCS2cifQ.eyJuYmYiOjE1MjE4ODI1MTUsImV4cCI6MTUyMTg4NjExNSwiaXNzIjoiaHR0cHM6Ly9pZGVudGl0eS53aGVyZWlzbXl0cmFuc3BvcnQuY29tIiwiYXVkIjoiaHR0cHM6Ly9pZGVudGl0eS53aGVyZWlzbXl0cmFuc3BvcnQuY29tL3Jlc291cmNlcyIsImNsaWVudF9pZCI6IjhlNDExNDQwLTA1NDgtNDllZC1hYjA4LWQ4MjU0NmE2ZmE3YiIsImNsaWVudF90ZW5hbnQiOiIyZmJjZTQzYS1lODQyLTQ3OTMtOWQ3ZS0xOTJkZTVmOTM0ODkiLCJqdGkiOiI2MDkzOTNlOWMwOTQ5Njg5YzY5NjMwYzM0YmMxYzljNyIsInNjb3BlIjpbInRyYW5zaXRhcGk6YWxsIl19.IFHIrUK4_24UblT8MfLQ2V_xPdFaGXekVciWIOZPabRnSm60-28p0F1vv1U0IlAKTtHO_h8nQdVw6CwNZQ58RieJKahTxp2zliUXuEKyd4jb-ZZ832j52RpC59JhtwJPHVwOx9wnJv2ViHU_ujn_gF8jndJRRCAdaZaRLMty1-kaI0P7L4CWD97yQczDTax1Jr8qQocMgxM4pBLNO4gUor0XIIilVBMK6OWSuTQczNjJhhnUsFL_NsyQQAiD9zNZZtqnb_3L7X6H9DSq9IXeUEj7TwNePvtZZdCmOEo_he9WiHeoTWk1M91Fi6MzIXKlfdjE6tGWIQG8d8dkoy4Weg';

var body = {
    geometry: {
        type: "Multipoint",
        coordinates: [[18.395448, -33.909531], [18.416798, -33.912683]]
    }
};

var request = new XMLHttpRequest();
request.open('POST', 'https://platform.whereismytransport.com/api/journeys', true);
request.setRequestHeader('Accept', 'application/json');
request.setRequestHeader('Content-Type', 'application/json');
request.setRequestHeader('Authorization', 'Bearer ' + token);
request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 201) {
        var responseText = request.responseText;
        var response = JSON.parse(request.responseText);
    }
};

request.send(JSON.stringify(body));