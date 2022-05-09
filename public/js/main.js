function addUrlSearchParams(data) {
    const url = new URL(window.location.href);
    if (Array.isArray(data) && data.length > 0) {
        data.forEach((entry) => {
            if (entry.value === "") {
                url.searchParams.has(data.key) &&
                    url.searchParams.delete(data.key);
            }
            url.searchParams.set(entry.key, entry.value);
        });
    } else {
        if (data.value === "") {
            url.searchParams.has(data.key) && url.searchParams.delete(data.key);
        } else {
            url.searchParams.set(data.key, data.value);
        }
    }
    location.href = url.toString();
}

function generateBarGrafic(data) {
    const labelsBarChart = new Array(data.length)
        .fill(0)
        .map((_, index) => `Kandidat ${index + 1}`);
    const backgroundColor = new Array(data.length)
        .fill(0)
        .map(() => randomHex());

    const dataBarChart = {
        labels: labelsBarChart,
        datasets: [
            {
                label: "Persentasi Voting Kandidat",
                backgroundColor,
                borderColor: "#868dad",
                data: data,
            },
        ],
    };

    const configBarChart = {
        type: "bar",
        data: dataBarChart,
        options: {
            scales: {
                y: {
                    suggestedMax: 100,
                },
            },
        },
    };

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.getElementById("chartBar"), configBarChart);
    });
}

// UTILITIES
function randomHex() {
    let n = (Math.random() * 0xfffff * 1000000).toString(16);
    return "#" + n.slice(0, 6);
}
