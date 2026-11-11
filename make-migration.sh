#!/bin/bash

read -p "Nama migration: " input

if [ -z "$input" ]; then
  echo "Error: nama tidak boleh kosong"
  exit 1
fi

mkdir -p database/migrations

timestamp=$(date +"%Y_%m_%d_%H%M%S")
filepath="database/migrations/${timestamp}_${input}.sql"
touch "$filepath"

echo "Berhasil membuat migration: $filepath"
