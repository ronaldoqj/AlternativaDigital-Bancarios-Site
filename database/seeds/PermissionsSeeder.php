<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->funcoesAdm();
        $this->portal();
        $this->fetrafiRS();
        $this->syndicate();
    }

    private function funcoesAdm()
    {
        DB::table('permissions')->insert([
            'entity' => 'adm',
            'name' => 'Sindicatos',
            'var_name' => 'adm_sindicatos',
            'description' => 'Gerenciamento dos sindicatos cadastrados no adm',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'adm',
            'name' => 'Meu Banco',
            'var_name' => 'adm_meuBanco',
            'description' => 'Gerenciamento dos bancos cadastrados no adm',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'adm',
            'name' => 'Entidades',
            'var_name' => 'adm_entidades',
            'description' => 'Gerenciamento das entidades no adm',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'adm',
            'name' => 'Entidades Parceiras',
            'var_name' => 'adm_entidadesParceiras',
            'description' => 'Gerenciamento das entidades parceiras no adm',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'adm',
            'name' => 'Usuários',
            'var_name' => 'adm_usuarios',
            'description' => 'Gerenciamento de todos usuarios no adm',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'adm',
            'name' => 'Meu Perfil',
            'var_name' => 'adm_meuPerfil',
            'description' => 'Gerenciamento das informações do próprio usuário no adm',
            'created_at' => Carbon::now()
        ]);
    }

    private function portal()
    {
        DB::table('permissions')->insert([
            'entity' => 'portal',
            'name' => 'Notícias',
            'var_name' => 'portal_noticias',
            'description' => 'Página notícias',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'portal',
            'name' => 'Editais',
            'var_name' => 'portal_editais',
            'description' => 'Página o editais',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'portal',
            'name' => 'Acordos e Convenções',
            'var_name' => 'portal_acordosEConvencoes',
            'description' => 'Página acordos e convenções',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'portal',
            'name' => 'Dados da Instituição',
            'var_name' => 'portal_dadosDaInstituicao',
            'description' => 'Gerenciamento dos dados da instituição',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'portal',
            'name' => 'Campanhas',
            'var_name' => 'portal_campanhas',
            'description' => 'Gerenciamento das campanhas que aparece na página home',
            'created_at' => Carbon::now()
        ]);
    }

    private function fetrafiRS()
    {
        DB::table('permissions')->insert([
            'entity' => 'fetrafi-rs',
            'name' => 'Dados da Instituição',
            'var_name' => 'fetrafiRs_dadosDaInstituicao',
            'description' => 'Gerenciamento dos dados da instituição',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'fetrafi-rs',
            'name' => 'Texto Institucional',
            'var_name' => 'fetrafiRs_textoInstitucional',
            'description' => 'Texto institucional',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'fetrafiRs',
            'name' => 'Contato',
            'var_name' => 'fetrafiRs_contato',
            'description' => 'Texto contato',
            'created_at' => Carbon::now()
        ]);
    }

    private function syndicate()
    {
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Notícias',
            'var_name' => 'syndicate_noticias',
            'description' => 'Página notícias',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Editais',
            'var_name' => 'syndicate_editais',
            'description' => 'Página editais',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Acordos e Convenções',
            'var_name' => 'syndicate_acordosEConvencoes',
            'description' => 'Página acordos e convenções',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Texto Institucional',
            'var_name' => 'syndicate_textoInstitucional',
            'description' => 'Gerenciar texto institucional',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Atualizar Instituição',
            'var_name' => 'syndicate_atualizarInstituicao',
            'description' => 'Gerenciar dados da instituição',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Serviços',
            'var_name' => 'syndicate_servicos',
            'description' => 'Página serviços',
            'created_at' => Carbon::now()
        ]);
        DB::table('permissions')->insert([
            'entity' => 'syndicate',
            'name' => 'Contato',
            'var_name' => 'syndicate_contato',
            'description' => 'Página contato',
            'created_at' => Carbon::now()
        ]);
    }
}
