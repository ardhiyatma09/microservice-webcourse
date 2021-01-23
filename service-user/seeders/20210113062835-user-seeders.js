'use strict';
const bcrypt = require('bcrypt')

module.exports = {
  up: async (queryInterface, Sequelize) => {
    await queryInterface.bulkInsert('users', [
      {
        name: 'ardhiyatma',
        profession: 'Admin Micro',
        role: 'admin',
        email: 'email@demo.com',
        password: await bcrypt.hash('rahasia1234',10),
        created_at: new Date(),
        updated_at: new Date()
      },
      {
        name: 'wibawa',
        profession: 'Frontend Developer',
        role: 'student',
        email: 'wibawa@demo.com',
        password: await bcrypt.hash('rahasiaku1234',10),
        created_at: new Date(),
        updated_at: new Date()
      },

    ]);
  },

  down: async (queryInterface, Sequelize) => {
    await queryInterface.bulkDelete('users', null, {});
  }
};
