FROM python:3.11-slim

WORKDIR /app

COPY . /app

RUN pip install --no-cache-dir -r requirements.txt

# Lindungi flag agar tidak bisa diakses lewat web
RUN chmod 600 flag.txt

EXPOSE 5000

CMD ["python", "app.py"]
