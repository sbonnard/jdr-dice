document.addEventListener('DOMContentLoaded', function () {
    _rollingTheDices = new rollingTheDices({
        container: 'body',
        lights: true,

        D100: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(100),
            faceBgColor: '#FF88EB',
        }],

        D20: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(20),
            faceBgColor: '#FF88EB',
        }],

        D12: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(12),
            faceBgColor: '#FF88EB',
        }],

        D10: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(10),
            faceBgColor: '#FF88EB',
        }],

        D8: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(8),
            faceBgColor: '#FF88EB',
        }],

        D6: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(6),
            faceBgColor: '#FF88EB',
        }],

        D4: [{
            items: 1,
            isImage: true,
            faceValues: getNumbersFromOneToWhatever(4),
            faceBgColor: '#FF88EB',
        }]
    });
});


/** Get all numbers from 1 to max.
 * 
 * @param {*} max max number to reach when dice rolled.
 * @returns An array of numbers between 1 and max.
 */
function getNumbersFromOneToWhatever(max) {
    let numberTable = [];

    for (let number = 1; number <= max; number++) {
        numberTable.push(number);
    }

    return numberTable;
}

console.log(getNumbersFromOneToWhatever(100));