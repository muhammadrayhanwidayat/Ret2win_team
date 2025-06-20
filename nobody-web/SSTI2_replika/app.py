from flask import Flask, request, render_template_string

app = Flask(__name__)

BLACKLIST = ['__', '.', '[', ']']

@app.route('/', methods=['GET', 'POST'])
def index():
    output = ''
    if request.method == 'POST':
        user_input = request.form.get('content', '')

        print(f"[DEBUG] Payload diterima: {user_input}")

        if any(bad in user_input for bad in BLACKLIST):
            return "NT coy! coba lagi cu."

        try:
            output = render_template_string(user_input, request=request)
            print(f"[DEBUG] Hasil render: {output}")
        except Exception as e:
            output = f"Error during rendering: {e}"

        return output

    return '''
    <html>
        <head><title>SSTI2</title></head>
        <body>
            <h1> Home </h1>
            <p> Masukkin payload nya bre!* </p>
            <form action="/" method="POST">
                What do you want to announce:
                <input name="content" id="announce">
                <button type="submit"> Ok </button>
            </form>
            <p style="font-size:10px;position:fixed;bottom:10px;left:10px;">
                *Announcements may only reach yourself
            </p>
        </body>
    </html>
    '''

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
