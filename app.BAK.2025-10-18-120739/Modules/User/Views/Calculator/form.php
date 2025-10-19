<style <?= $nonce['style'] ?? '' ?>>
    .google-calculator-display {
        font-size: 24px;
        background-color: #f1f3f4;
    }

    .google-calculator-row {
        display: flex;
        justify-content: space-between;
    }

    .google-calculator-button {
        width: 33%;
        font-size: 18px;
        background-color: #f1f3f4;
        text-align: center;
    }

    .google-calculator-button:hover {
        background-color: #d4d6d7;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <input type="text" id="display" class="form-control mb-3 google-calculator-display" disabled>
            <div id="calculatorButtons">
                <!-- Number Buttons -->
                <div class="btn-group mb-2 google-calculator-row">
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('7')">7</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('8')">8</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('9')">9</button>
                </div>
                <div class="btn-group mb-2 google-calculator-row">
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('4')">4</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('5')">5</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('6')">6</button>
                </div>
                <div class="btn-group mb-2 google-calculator-row">
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('1')">1</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('2')">2</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('3')">3</button>
                </div>
                <div class="btn-group mb-2 google-calculator-row">
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('0')">0</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('.')">.</button>
                    <button class="btn btn-primary google-calculator-button" onclick="performCalculation()">=</button>
                </div>
                <!-- Operator Buttons -->
                <div class="btn-group mb-2 google-calculator-row">
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('+')">+</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('-')">-</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('*')">*</button>
                    <button class="btn btn-light google-calculator-button" onclick="appendToDisplay('/')">/</button>
                </div>
                <!-- Special Buttons -->
                <div class="btn-group mb-2 google-calculator-row">
                    <button class="btn btn-light google-calculator-button" onclick="clearDisplay()">C</button>
                </div>
            </div>
            <div id="result" class="mt-3"></div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    document.addEventListener("DOMContentLoaded", function() {

        let displayValue = '';

        function appendToDisplay(value) {
            displayValue += value;
            document.getElementById('display').value = displayValue;
        }

        function clearDisplay() {
            displayValue = '';
            document.getElementById('display').value = '';
        }

        function performCalculation() {
            try {
                let result;
                const type = document.getElementById('calculatorType').value;

                if (type === 'basic') {
                    const num1 = parseFloat(document.getElementById('num1').value);
                    const num2 = parseFloat(document.getElementById('num2').value);
                    result = eval(`${num1}${displayValue}${num2}`);
                } else if (type === 'mortgage') {
                    const principal = parseFloat(document.getElementById('principal').value);
                    const rate = parseFloat(document.getElementById('rate').value) / 100 / 12;
                    const term = parseFloat(document.getElementById('term').value) * 12;
                    result = principal * rate * Math.pow((1 + rate), term) / (Math.pow((1 + rate), term) - 1);
                } else if (type === 'investment') {
                    const initial = parseFloat(document.getElementById('initial').value);
                    const monthly = parseFloat(document.getElementById('monthly').value);
                    const rate = parseFloat(document.getElementById('rate').value) / 100 / 12;
                    result = initial * Math.pow((1 + rate), 360) + monthly * ((Math.pow((1 + rate), 360) - 1) / rate);
                } else if (type === 'retirement') {
                    const age = parseFloat(document.getElementById('age').value);
                    const retirementAge = parseFloat(document.getElementById('retirementAge').value);
                    const annualIncome = parseFloat(document.getElementById('annualIncome').value);
                    result = annualIncome / 0.04; // 4% Safe Withdrawal Rate
                } else if (type === 'budget') {
                    const income = parseFloat(document.getElementById('income').value);
                    const expenses = parseFloat(document.getElementById('expenses').value);
                    result = income - expenses;
                } else if (type === 'loan') {
                    const loanAmount = parseFloat(document.getElementById('loanAmount').value);
                    const loanRate = parseFloat(document.getElementById('loanRate').value) / 100 / 12;
                    const loanTerm = parseFloat(document.getElementById('loanTerm').value);
                    result = loanAmount * loanRate / (1 - Math.pow(1 + loanRate, -loanTerm));
                } else if (type === 'compound') {
                    const principal = parseFloat(document.getElementById('principal').value);
                    const compoundRate = parseFloat(document.getElementById('compoundRate').value) / 100;
                    const compoundYears = parseFloat(document.getElementById('compoundYears').value);
                    result = principal * Math.pow((1 + compoundRate), compoundYears);
                } else if (type === 'savings') {
                    const savingsGoal = parseFloat(document.getElementById('savingsGoal').value);
                    const savingsRate = parseFloat(document.getElementById('savingsRate').value) / 100;
                    result = savingsGoal / (1 + savingsRate);
                } else if (type === 'debt') {
                    const totalDebt = parseFloat(document.getElementById('totalDebt').value);
                    const totalIncome = parseFloat(document.getElementById('totalIncome').value);
                    result = (totalDebt / totalIncome) * 100;
                }

                document.getElementById('result').innerText = `Result: ${result.toFixed(2)}`;
            } catch (error) {
                console.error("An error occurred: ", error);
            }
        }
    });
</script>
